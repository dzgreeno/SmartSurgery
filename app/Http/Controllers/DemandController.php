<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\Services\GoogleCalendarService;
use App\Mail\AppointmentConfirmed;
use Illuminate\Support\Facades\Mail;
use Exception;

class DemandController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:255',
            'fname' => 'nullable|string|max:255',
            'lname' => 'nullable|string|max:255',
            'patient_email' => 'required|email|max:255',
            'patient_phone' => 'nullable|string|max:20',
            'type' => 'required|string|max:255',
            'description' => 'nullable|string',
            'date' => 'required|date',
        ]);

        $fullName = $request->name ?: trim($request->fname . ' ' . $request->lname);
        $description = $request->description ?: 'طلب موعد عبر الموقع الرسمي';

        Demand::create([
            'patient_name' => $fullName,
            'patient_email' => $request->patient_email,
            'patient_phone' => $request->patient_phone,
            'surgery_type' => $request->type,
            'description' => $description,
            'requested_date' => $request->date,
            'status' => 'pending',
            'email_status' => 'not_sent',
        ]);

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json(['success' => true, 'message' => 'تم إرسال طلبك بنجاح. سيتم مراجعته من قبل الإدارة.']);
        }

        return back()->with('success', 'تم إرسال طلبك بنجاح. سيتم مراجعته من قبل الإدارة.');
    }

    public function index()
    {
        $demands = Demand::latest()->get();
        return view('admin.demands', compact('demands'));
    }

    public function updateStatus(Request $request, $id)
    {
        $demand = Demand::findOrFail($id);
        $demand->update([
            'status' => $request->status,
            'admin_notes' => $request->admin_notes,
        ]);

        return back()->with('success', 'تم تحديث حالة الطلب بنجاح.');
    }

    public function confirmAppointment(Request $request, $id, GoogleCalendarService $calendarService)
    {
        $request->validate([
            'confirmed_date' => 'required|date',
            'confirmed_time' => 'required',
        ]);

        $demand = Demand::findOrFail($id);
        
        $demand->update([
            'status' => 'scheduled',
            'confirmed_date' => $request->confirmed_date,
            'confirmed_time' => $request->confirmed_time,
        ]);

        // Add to Google Calendar
        try {
            $eventId = $calendarService->createAppointmentEvent($demand);
            $demand->update(['calendar_event_id' => $eventId]);
        } catch (Exception $e) {
            // Logs Calendar error but we keep it scheduled
            \Log::error("Google Calendar Error: " . $e->getMessage());
        }

        // Send Email
        if ($demand->patient_email) {
            try {
                Mail::to($demand->patient_email)->send(new AppointmentConfirmed($demand));
                $demand->update(['email_status' => 'sent', 'email_fail_reason' => null]);
            } catch (Exception $e) {
                // Keep the appointment confirmed if email fails, but record error
                \Log::error("Email Error: " . $e->getMessage());
                $demand->update([
                    'email_status' => 'failed',
                    'email_fail_reason' => mb_substr($e->getMessage(), 0, 500)
                ]);
            }
        }

        return back()->with('success', 'تم تأكيد الموعد وتحديث الأحداث بنجاح.');
    }
}
