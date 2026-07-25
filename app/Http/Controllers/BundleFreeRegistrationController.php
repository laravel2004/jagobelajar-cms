<?php

namespace App\Http\Controllers;

use App\Models\ExamBundle;
use App\Models\UserPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class BundleFreeRegistrationController extends Controller
{
    public function store(Request $request, string $slug): RedirectResponse
    {
        if (! $request->user()) {
            return redirect()->guest(route('login'));
        }

        $bundle = ExamBundle::where('slug', $slug)
            ->where('status', 'active')
            ->with('sessions')
            ->firstOrFail();

        if (! $bundle->is_free_package_active) {
            return back()->withErrors(['register' => 'Paket gratis tidak tersedia untuk bundle ini.']);
        }

        $request->validate([
            'proof_follow' => ['required', 'image', 'max:4096'],
            'proof_comment' => ['required', 'image', 'max:4096'],
        ]);

        $proofFollowPath = $request->file('proof_follow')->store('proofs/follow', 'public');
        $proofCommentPath = $request->file('proof_comment')->store('proofs/comment', 'public');

        $user = $request->user();
        $successfulRegistrations = 0;
        $failedRegistrations = 0;

        DB::transaction(function () use ($bundle, $user, $proofFollowPath, $proofCommentPath, &$successfulRegistrations, &$failedRegistrations) {
            foreach ($bundle->sessions as $session) {
                if (blank($session->source_code)) {
                    $failedRegistrations++;
                    continue;
                }

                $endpoint = rtrim(config('services.irt_quiz.exam_session_register_endpoint'), '/').'/'.$session->source_code.'/register';
                
                try {
                    $response = Http::asJson()->timeout(15)->post($endpoint, [
                        'name' => $user->name,
                        'email' => $user->email,
                        'password' => $user->password,
                        'whatsapp' => $user->whatsapp ?? '-',
                        'phone' => $user->whatsapp ?? '-',
                        'address' => $user->address,
                    ]);

                    if ($response->successful()) {
                        $successfulRegistrations++;
                        $joinUrl = $response->json('join_url') ?: rtrim(config('services.irt_quiz.base_url'), '/').'/dashboard';
                        
                        UserPackage::updateOrCreate(
                            [
                                'user_id' => $user->id,
                                'package_type' => 'tryout',
                                'package_id' => $session->id,
                            ],
                            [
                                'package_name' => $session->title ?? $session->name,
                                'status' => 'registered',
                                'registered_at' => now(),
                                'external_session_id' => $session->external_id,
                                'join_url' => $joinUrl,
                                'proof_follow_path' => $proofFollowPath,
                                'proof_comment_path' => $proofCommentPath,
                            ]
                        );
                    } else {
                        $failedRegistrations++;
                    }
                } catch (\Throwable $e) {
                    $failedRegistrations++;
                }
            }
        });

        if ($successfulRegistrations === 0 && $bundle->sessions->count() > 0) {
            return back()->withErrors(['register' => 'Gagal mendaftarkan paket gratis ke semua sesi ujian di dalam bundle.']);
        }

        $message = "Pendaftaran bundle gratis berhasil ({$successfulRegistrations} sesi terdaftar, {$failedRegistrations} gagal).";
        return redirect()->route('user.dashboard')->with('status', $message.' Kamu bisa lihat di paket terdaftar.');
    }
}
