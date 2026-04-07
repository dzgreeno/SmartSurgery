<?php

namespace App\Services;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Google_Service_Calendar_EventDateTime;
use Carbon\Carbon;
use Exception;

class GoogleCalendarService
{
    protected $client;
    protected $service;

    public function __construct()
    {
        $this->client = new Google_Client();
        $this->client->setApplicationName("SmartSurgery Appointments");
        $this->client->setScopes([Google_Service_Calendar::CALENDAR_EVENTS]);
        
        $credentialsPath = storage_path('app/google-calendar/credentials.json');
        
        if (file_exists($credentialsPath)) {
            $this->client->setAuthConfig($credentialsPath);
            $this->service = new Google_Service_Calendar($this->client);
        } else {
            // Optional: Handle missing credentials gracefully rather than fatal error
            $this->service = null;
        }
    }

    /**
     * Create a calendar event for a confirmed appointment
     */
    public function createAppointmentEvent($demand)
    {
        if (!$this->service) {
            throw new Exception("Google Calendar credentials not found.");
        }

        // Calendar ID from env or fallback to primary
        $calendarId = env('GOOGLE_CALENDAR_ID', 'primary');
        
        $startDateTime = Carbon::parse($demand->confirmed_date . ' ' . $demand->confirmed_time)->format(Carbon::RFC3339);
        // Assuming typical appointment takes 1 hour
        $endDateTime = Carbon::parse($demand->confirmed_date . ' ' . $demand->confirmed_time)->addHour()->format(Carbon::RFC3339);

        $event = new Google_Service_Calendar_Event([
            'summary' => 'موعد طبي: ' . $demand->patient_name,
            'description' => "مريض: {$demand->patient_name}\nالتخصص/العملية: {$demand->surgery_type}\nتأكيد عبر نظام SmartSurgery.",
            'start' => new Google_Service_Calendar_EventDateTime([
                'dateTime' => $startDateTime,
                'timeZone' => env('APP_TIMEZONE', 'Africa/Algiers'),
            ]),
            'end' => new Google_Service_Calendar_EventDateTime([
                'dateTime' => $endDateTime,
                'timeZone' => env('APP_TIMEZONE', 'Africa/Algiers'),
            ]),
        ]);

        if (!empty($demand->patient_email)) {
            $event->setAttendees([
                ['email' => $demand->patient_email],
            ]);
        }

        $createdEvent = $this->service->events->insert($calendarId, $event);

        return $createdEvent->getId();
    }
}
