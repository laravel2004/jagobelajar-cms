<?php

namespace App\Http\Controllers;

use App\Models\ExamSession;
use App\Models\UserPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class FreePackageRegistrationController extends Controller
{
    public function store(Request $request, ExamSession $examSession): RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        if (! $examSession->is_free_package_active || blank($examSession->source_code)) {
            return back()->withErrors(['register' => 'Paket gratis tidak tersedia untuk sesi ini.']);
        }

        $endpoint = rtrim(config('services.irt_quiz.exam_session_register_endpoint'), '/').'/'.$examSession->source_code.'/register';
        $user = $request->user();

        try {
            $response = Http::asJson()->timeout(15)->post($endpoint, [
                'name' => $user->name,
                'email' => $user->email,
                'password' => $user->password,
                'whatsapp' => $user->whatsapp ?? '-',
                'phone' => $user->whatsapp ?? '-',
                'address' => $user->address,
            ]);
        } catch (\Throwable $exception) {
            return back()->withErrors(['register' => 'Gagal terhubung ke layanan tryout: '.$exception->getMessage()]);
        }

        if (! $response->successful()) {
            return back()->withErrors(['register' => 'Pendaftaran paket gratis gagal: '.$response->json('message', 'response tidak valid')]);
        }

        $joinUrl = $response->json('join_url') ?: rtrim(config('services.irt_quiz.base_url'), '/').'/dashboard';
        $registrationMessage = $response->json('message', 'Pendaftaran berhasil.');

        UserPackage::updateOrCreate(
            [
                'user_id' => $user->id,
                'package_type' => 'tryout',
                'package_id' => $examSession->id,
            ],
            [
                'package_name' => $examSession->title ?? $examSession->name,
                'status' => 'registered',
                'registered_at' => now(),
                'external_session_id' => $examSession->external_id,
                'join_url' => $joinUrl,
            ]
        );

        return redirect()->route('user.dashboard')->with('status', $registrationMessage.' Kamu bisa lihat di paket terdaftar.');
    }
}
