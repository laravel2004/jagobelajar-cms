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
                'payment_due_date' => 60 // 60 minutes
            ],
            'customer' => [
                'name' => $customerDetails['first_name'] ?? 'Customer',
                'email' => $customerDetails['email'] ?? 'customer@example.com',
            ]
        ];

        try {
            // Uncomment and implement proper signature when Doku keys are ready
            /*
            $response = Http::withHeaders([
                'Client-Id' => $clientId,
                'Request-Id' => uniqid(),
                'Request-Timestamp' => gmdate("Y-m-d\TH:i:s\Z"),
                'Signature' => $this->generateSignature($payload, $endpoint, $secretKey)
            ])->post($baseUrl . $endpoint, $payload);

            if ($response->successful()) {
                return $response->json('response.payment.url');
            }
            */

            // MOCK URL FOR NOW until signature is correctly implemented by junior
            Log::info('Doku payment link generated (MOCK)', ['order_id' => $payment->order_id]);
            return url('/mock-doku-payment-page?order_id=' . $payment->order_id);
            
        } catch (\Throwable $th) {
            Log::error('Doku generate payment link error', ['message' => $th->getMessage()]);
            return null;
        }
    }

    private function generateSignature(array $payload, string $path, string $secretKey): string
    {
        // TODO: Implement Doku Jokul Signature Logic
        // Digest = Base64(SHA256(JSON(Payload)))
        // Signature = HMAC-SHA256(Client-Id + Request-Id + Request-Timestamp + URI + Digest, SecretKey)
        return 'mock-signature';
    }
}
