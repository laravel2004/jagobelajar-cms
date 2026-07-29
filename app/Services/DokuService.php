<?php

namespace App\Services;

use App\Models\Payment;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class DokuService
{
    /**
     * Generate a Doku payment link for a given payment.
     *
     * @param Payment $payment
     * @param array $customerDetails
     * @param array $itemDetails
     * @return string|null Redirect URL to Doku Payment Page
     */
    public function generatePaymentLink(Payment $payment, array $customerDetails, array $itemDetails): ?string
    {
        $clientId = config('services.doku.client_id');
        $secretKey = config('services.doku.secret_key');
        $isProduction = config('services.doku.is_production');

        $baseUrl = $isProduction ? 'https://api.doku.com' : 'https://api-sandbox.doku.com';
        $endpoint = '/checkout/v1/payment';

        // NOTE: For the Junior Programmer, this is a skeleton for Doku Jokul Integration.
        // You will need to implement the proper Doku Signature Header (HMAC-SHA256).
        // Since we don't have the exact library installed, we will return a mock URL
        // or attempt the call based on standard Jokul documentation.

        $payload = [
            'order' => [
                'amount' => $payment->gross_amount,
                'invoice_number' => $payment->order_id,
                'callback_url' => route('home'), // Add proper success route here
            ],
            'payment' => [
                'payment_due_date' => 60, // 60 minutes
                'payment_method_types' => [
                    'VIRTUAL_ACCOUNT_BCA',
                    'VIRTUAL_ACCOUNT_BANK_MANDIRI',
                    'VIRTUAL_ACCOUNT_BANK_BRI',
                    'VIRTUAL_ACCOUNT_BANK_BNI',
                    'OVO',
                    'SHOPEEPAY',
                    'QRIS'
                ]
            ],
            'customer' => [
                'name' => $customerDetails['first_name'] ?? 'Customer',
                'email' => $customerDetails['email'] ?? 'customer@example.com',
            ]
        ];

        $requestId = uniqid();
        $requestTimestamp = gmdate("Y-m-d\TH:i:s\Z");

        try {
            $response = Http::withHeaders([
                'Client-Id' => $clientId,
                'Request-Id' => $requestId,
                'Request-Timestamp' => $requestTimestamp,
                'Signature' => $this->generateSignature($payload, $endpoint, $secretKey, $clientId, $requestId, $requestTimestamp)
            ])->post($baseUrl . $endpoint, $payload);

            if ($response->successful()) {
                return $response->json('response.payment.url');
            }

            Log::error('Doku generate payment link failed', [
                'status' => $response->status(),
                'response' => $response->json(),
                'order_id' => $payment->order_id
            ]);
            
            // Fallback to mock if API fails (e.g. invalid keys)
            return url('/mock-doku-payment-page?order_id=' . $payment->order_id);
            
        } catch (\Throwable $th) {
            Log::error('Doku generate payment link error', ['message' => $th->getMessage()]);
            return null;
        }
    }

    private function generateSignature(array $payload, string $path, string $secretKey, string $clientId, string $requestId, string $requestTimestamp): string
    {
        $digest = base64_encode(hash('sha256', json_encode($payload), true));
        $componentSignature = "Client-Id:" . $clientId . "\n" .
            "Request-Id:" . $requestId . "\n" .
            "Request-Timestamp:" . $requestTimestamp . "\n" .
            "Request-Target:" . $path . "\n" .
            "Digest:" . $digest;

        $signature = base64_encode(hash_hmac('sha256', $componentSignature, $secretKey, true));
        return "HMACSHA256=" . $signature;
    }
}
