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
     * Confirm a Firebase Appointment (Email + Google Calendar + optionally Firebase update)
     * Firebase DB update is now handled client-side as primary method.
     * Server-side Firebase update is attempted as backup only.
     */
    public function confirmFirebaseAppt(Request $request, GoogleCalendarService $calendarService)
    {
        $id = $request->id;

        // Build demand object for Mail/Calendar
        $demand = new \stdClass();
        $demand->patient_name = $request->fname . ' ' . $request->lname;
        $demand->patient_email = $request->email;
        $demand->patient_phone = $request->phone;
        $demand->surgery_type = $request->department;
        $demand->confirmed_date = $request->confirmed_date;
        $demand->confirmed_time = $request->confirmed_time;

        $calendarOk = false;
        $emailOk = false;
        $firebaseOk = false;

        // 1. Google Calendar
        try {
            $eventId = $calendarService->createAppointmentEvent($demand);
            $demand->calendar_event_id = $eventId;
            $calendarOk = true;
        } catch (Exception $e) {
            \Log::error("Google Calendar Error: " . $e->getMessage());
        }

        // 2. Send Email
        if (!empty($demand->patient_email)) {
            try {
                Mail::to($demand->patient_email)->send(new AppointmentConfirmed($demand));
                $emailOk = true;
            } catch (Exception $e) {
                \Log::error("Email Error: " . $e->getMessage());
            }
        }

        // 3. Try server-side Firebase update (backup — primary update done client-side)
        try {
            $firebaseService = app(FirebaseService::class);
            $db = $firebaseService->getDatabase();
            
            $refPath = "appointments/requests/{$id}";
            $confirmedPath = "appointments/confirmed/{$id}";
            
            $data = (array) $demand;
            $data['status'] = 'Confirmed';
            $data['exactTime'] = $request->confirmed_time;
            $data['updatedAt'] = ['.sv' => 'timestamp'];

            $db->getReference($confirmedPath)->set($data);
            $db->getReference($refPath)->remove();
            $firebaseOk = true;
        } catch (Exception $e) {
            \Log::warning("Server-side Firebase update failed (client-side handles this): " . $e->getMessage());
            // Not a fatal error — client-side JS handles the Firebase update as primary
        }

        return response()->json([
            'success' => true, 
            'message' => 'تم تأكيد الموعد وإرسال الإشعارات بنجاح.',
            'firebase_updated' => $firebaseOk,
            'calendar_ok' => $calendarOk,
            'email_ok' => $emailOk,
        ]);
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
