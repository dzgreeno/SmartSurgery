<?php

namespace App\Http\Controllers;

use App\Models\Demand;
use Illuminate\Http\Request;
use App\Services\GoogleCalendarService;
use App\Mail\AppointmentConfirmed;
use Illuminate\Support\Facades\Mail;
use App\Services\FirebaseService;
use Exception;

class DemandController extends Controller
{
    /**
     * Confirm a Firebase Appointment (Email + Google Calendar + Firebase update)
     */
    public function confirmFirebaseAppt(Request $request, GoogleCalendarService $calendarService, FirebaseService $firebaseService)
    {
        $id = $request->id;
        $db = $firebaseService->getDatabase();
        
        // Mock a demand object for Mail/Calendar
        $demand = new \stdClass();
        $demand->patient_name = $request->fname . ' ' . $request->lname;
        $demand->patient_email = $request->email;
        $demand->patient_phone = $request->phone;
        $demand->surgery_type = $request->department;
        $demand->confirmed_date = $request->confirmed_date;
        $demand->confirmed_time = $request->confirmed_time;

        // 1. Google Calendar
        try {
            $eventId = $calendarService->createAppointmentEvent($demand);
            $demand->calendar_event_id = $eventId;
        } catch (Exception $e) {
            \Log::error("Google Calendar Error: " . $e->getMessage());
        }

        // 2. Send Email
        if (!empty($demand->patient_email)) {
            try {
                Mail::to($demand->patient_email)->send(new AppointmentConfirmed($demand));
            } catch (Exception $e) {
                \Log::error("Email Error: " . $e->getMessage());
            }
        }

        // 3. Update Firebase (Move from requests to confirmed)
        try {
            $refPath = "appointments/requests/{$id}";
            $confirmedPath = "appointments/confirmed/{$id}";
            
            $data = (array) $demand;
            $data['status'] = 'Confirmed';
            $data['exactTime'] = $request->confirmed_time;
            $data['updatedAt'] = ['.sv' => 'timestamp'];

            $db->getReference($confirmedPath)->set($data);
            $db->getReference($refPath)->remove();
        } catch (Exception $e) {
            return response()->json(['success' => false, 'message' => 'حدث خطأ أثناء تحديث Firebase: ' . $e->getMessage()]);
        }

        return response()->json(['success' => true, 'message' => 'تم تأكيد الموعد وإرسال الإشعارات بنجاح.']);
    }

    public function store(Request $request)
    {
        // DISABLED SQL Store to fix Vercel 500 error
        return response()->json(['error' => 'Please use Firebase directly for submissions.'], 400);
    }

    public function index()
    {
        // SQL demand disabled
        return view('admin.demands', ['demands' => collect([])]);
    }
}
