<?php

namespace App\Services;

use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Http;

class GoogleCalendarService
{
    protected $credentials;

    public function __construct()
    {
        $credentialsPath = storage_path('app/google-calendar/credentials.json');
        if (file_exists($credentialsPath)) {
            $this->credentials = json_decode(file_get_contents($credentialsPath), true);
        } else {
            $this->credentials = null;
        }
    }

    protected function getAccessToken()
    {
        if (!$this->credentials) {
            throw new Exception("Google Calendar credentials not found.");
        }

        $header = json_encode(['alg' => 'RS256', 'typ' => 'JWT']);
        $payload = json_encode([
            'iss' => $this->credentials['client_email'],
            'scope' => 'https://www.googleapis.com/auth/calendar.events',
            'aud' => 'https://oauth2.googleapis.com/token',
            'exp' => time() + 3600,
            'iat' => time(),
        ]);

        $base64UrlHeader = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($header));
        $base64UrlPayload = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($payload));
        $signatureInput = $base64UrlHeader . '.' . $base64UrlPayload;

        $privateKey = $this->cleanPrivateKey($this->credentials['private_key']);
        openssl_sign($signatureInput, $signature, $privateKey, 'SHA256');
        
        $base64UrlSignature = str_replace(['+', '/', '='], ['-', '_', ''], base64_encode($signature));
        $jwt = $signatureInput . '.' . $base64UrlSignature;

        $response = Http::asForm()->post('https://oauth2.googleapis.com/token', [
            'grant_type' => 'urn:ietf:params:oauth:grant-type:jwt-bearer',
            'assertion' => $jwt,
        ]);

        if ($response->failed()) {
            throw new Exception("Failed to get Google access token: " . $response->body());
        }

        return $response->json()['access_token'];
    }

    /**
     * Create a calendar event for a confirmed appointment
     */
    public function createAppointmentEvent($demand)
    {
        $accessToken = $this->getAccessToken();
        
        $calendarId = env('GOOGLE_CALENDAR_ID', 'primary');
        
        $startDateTime = Carbon::parse($demand->confirmed_date . ' ' . $demand->confirmed_time)->format(Carbon::RFC3339);
        $endDateTime = Carbon::parse($demand->confirmed_date . ' ' . $demand->confirmed_time)->addHour()->format(Carbon::RFC3339);

        // Map to Google Calendar Event logic
        $eventData = [
            'summary' => 'موعد طبي: ' . $demand->patient_name,
            'description' => "مريض: {$demand->patient_name}\nالتخصص/العملية: {$demand->surgery_type}\nتأكيد عبر نظام SmartSurgery.",
            'start' => [
                'dateTime' => $startDateTime,
                'timeZone' => env('APP_TIMEZONE', 'Africa/Algiers'),
            ],
            'end' => [
                'dateTime' => $endDateTime,
                'timeZone' => env('APP_TIMEZONE', 'Africa/Algiers'),
            ],
        ];

        if (!empty($demand->patient_email)) {
            $eventData['attendees'] = [
                ['email' => $demand->patient_email],
            ];
        }

        // POST request
        $response = Http::withToken($accessToken)
            ->post("https://www.googleapis.com/calendar/v3/calendars/{$calendarId}/events", $eventData);

        if ($response->failed()) {
            throw new Exception("Failed to create Google Calendar event: " . $response->body());
        }

        return $response->json()['id'];
    }

    /**
     * Clean a private key string to ensure it's a valid PEM format for OpenSSL
     */
    protected function cleanPrivateKey($key)
    {
        // 1. Convert literal \n sequences to actual newlines
        $key = str_replace(['\\n', '\n'], "\n", $key);
        
        // 2. Remove any accidental whitespace/carriage returns
        $key = trim($key);
        
        // 3. If the key is a single line (collapsed), re-wrap it properly
        if (!str_contains($key, "\n") || str_contains($key, "  ")) {
            $cleanContent = str_replace([
                "-----BEGIN PRIVATE KEY-----", 
                "-----END PRIVATE KEY-----", 
                "\r", "\n", " "
            ], "", $key);
            
            $key = "-----BEGIN PRIVATE KEY-----\n" 
                 . chunk_split($cleanContent, 64, "\n") 
                 . "-----END PRIVATE KEY-----";
        }
        
        // 4. Ensure it has the headers correctly
        if (!str_contains($key, '-----BEGIN PRIVATE KEY-----')) {
            $key = "-----BEGIN PRIVATE KEY-----\n" . $key;
        }
        if (!str_contains($key, '-----END PRIVATE KEY-----')) {
            $key = $key . "\n-----END PRIVATE KEY-----";
        }

        return $key;
    }
}
