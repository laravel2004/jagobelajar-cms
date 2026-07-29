<x-layouts.public :title="($isPending ? 'Menunggu Pembayaran' : 'Pembayaran Berhasil') . ' - ' . config('app.name')">
    <div class="bg-[#f9f9ff] py-12 lg:py-20 flex items-center justify-center min-h-[70vh]">
        <div class="max-w-md w-full px-4">
            <div class="bg-white rounded-3xl p-8 text-center shadow-[0_14px_34px_rgba(20,27,44,0.10)] ring-1 ring-[#e9edff]">
                
                @if ($isPending)
                    <div class="mx-auto w-20 h-20 bg-orange-100 text-orange-500 rounded-full flex items-center justify-center mb-6">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h1 class="text-2xl font-extrabold text-[#141b2c] mb-2">Menunggu Pembayaran</h1>
                    <p class="text-[#5f667d] mb-8">Pembayaran Anda untuk paket bundle <strong>{{ $bundle?->title ?? $bundle?->name }}</strong> sedang menunggu diselesaikan.</p>
                @else
                    <div class="mx-auto w-20 h-20 bg-emerald-100 text-emerald-500 rounded-full flex items-center justify-center mb-6">
                        <svg class="h-10 w-10" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
                    </div>
                    <h1 class="text-2xl font-extrabold text-[#141b2c] mb-2">Pembayaran Berhasil!</h1>
                    <p class="text-[#5f667d] mb-8">Terima kasih, pembayaran untuk paket bundle <strong>{{ $bundle?->title ?? $bundle?->name }}</strong> telah kami terima. Anda sekarang terdaftar pada semua sesi ujian di dalam bundle ini.</p>
                @endif
                
                <div class="border-t border-gray-100 pt-6 space-y-4">
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Order ID</span>
                        <span class="font-bold text-gray-900">{{ $payment->order_id }}</span>
                    </div>
                    <div class="flex justify-between text-sm">
                        <span class="text-gray-500">Total</span>
                        <span class="font-bold text-gray-900">Rp{{ number_format($payment->gross_amount, 0, ',', '.') }}</span>
                    </div>
                </div>

                <div class="mt-8 space-y-3">
                    <a href="{{ route('user.dashboard') }}" class="w-full flex justify-center items-center rounded-2xl bg-[#0043c6] px-5 py-3.5 text-sm font-extrabold text-white transition hover:bg-[#1e5af0]">
                        Ke Dashboard Saya
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-layouts.public>
