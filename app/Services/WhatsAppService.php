<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    private string $apiUrl;

    private string $apiKey;

    public function __construct()
    {
        $this->apiUrl = config('services.whatsapp.api_url');
        $this->apiKey = config('services.whatsapp.api_key');
    }

    public function sendMessage(string $to, string $message): bool
    {
        if (empty($this->apiUrl) || empty($this->apiKey)) {
            Log::warning('WhatsApp API not configured. Message not sent.', [
                'to' => $to,
                'message' => $message,
            ]);

            return false;
        }

        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->apiKey,
                'Content-Type' => 'application/json',
            ])->post($this->apiUrl, [
                'to' => $this->formatNumber($to),
                'message' => $message,
            ]);

            if ($response->successful()) {
                Log::info('WhatsApp message sent successfully.', ['to' => $to]);

                return true;
            }

            Log::error('WhatsApp API error.', [
                'to' => $to,
                'status' => $response->status(),
                'body' => $response->json(),
            ]);

            return false;
        } catch (\Exception $e) {
            Log::error('WhatsApp send failed.', [
                'to' => $to,
                'error' => $e->getMessage(),
            ]);

            return false;
        }
    }

    public function sendActivationMessage(string $noHp, string $nik, string $token): bool
    {
        $message = "Akun Warga Anda sudah diaktifkan!\n\n";
        $message .= "NIK (Username): {$nik}\n";
        $message .= "Token Aktivasi: {$token}\n\n";
        $message .= "Silakan login dan buat password Anda.";

        return $this->sendMessage($noHp, $message);
    }

    private function formatNumber(string $number): string
    {
        $number = preg_replace('/[^0-9]/', '', $number);

        if (str_starts_with($number, '0')) {
            $number = '62' . substr($number, 1);
        }

        return $number;
    }
}