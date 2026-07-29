<x-layouts.public :title="'Proses Pembayaran - '.config('app.name')">
    <section class="bg-[#f9f9ff] py-12 sm:py-24 min-h-[70vh] flex items-center justify-center">
        <div class="jb-container mx-auto max-w-md text-center">
            <div class="rounded-[2rem] bg-white p-8 shadow-[0_18px_50px_rgba(20,27,44,0.12)] ring-1 ring-[#e9edff]">
                <div class="mx-auto grid h-16 w-16 place-items-center rounded-full bg-blue-50 text-3xl text-blue-600 mb-6">
                    <svg class="h-8 w-8 animate-spin" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                </div>
                <h1 class="text-2xl font-extrabold text-[#141b2c]">Memproses Pembayaran...</h1>
                <p class="mt-3 text-sm leading-6 text-[#5f667d]">
                    Mohon tunggu sebentar, kami sedang menampilkan halaman pembayaran.
                </p>
                <div class="mt-8">
                    <button id="pay-button" class="inline-flex items-center justify-center rounded-xl bg-[#0043c6] px-6 py-3 text-sm font-bold text-white transition hover:bg-[#0036a1]">
                        Buka Kembali Popup Pembayaran
                    </button>
                    <div class="mt-4">
                        <a href="{{ route('home') }}" class="text-sm font-semibold text-[#64708b] hover:text-[#141b2c]">Batal & Kembali ke Beranda</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @php
        $snapJsUrl = config('services.midtrans.is_production') ? 'https://app.midtrans.com/snap/snap.js' : 'https://app.sandbox.midtrans.com/snap/snap.js';
        $clientKey = config('services.midtrans.client_key');
        
        $successRoute = '';
        if ($payment->package_type === 'bimbel') {
            $successRoute = route('bimbel.payment.success', $payment);
        } elseif ($payment->package_type === 'tryout') {
            $successRoute = route('tryout.payment.success', $payment);
        } elseif ($payment->package_type === 'bundle') {
            $successRoute = route('bundle.payment.success', $payment);
        }
    @endphp

    <script src="{{ $snapJsUrl }}" data-client-key="{{ $clientKey }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            function triggerSnap() {
                window.snap.pay('{{ $payment->snap_token }}', {
                    onSuccess: function(result){
                        window.location.href = "{{ $successRoute }}";
                    },
                    onPending: function(result){
                        window.location.href = "{{ $successRoute }}";
                    },
                    onError: function(result){
                        alert('Pembayaran gagal. Silakan coba lagi.');
                    },
                    onClose: function(){
                        console.log('Popup ditutup oleh user.');
                    }
                });
            }

            // Secara otomatis tampilkan popup saat halaman dimuat
            setTimeout(triggerSnap, 500);

            // Tombol untuk memunculkan kembali popup
            document.getElementById('pay-button').addEventListener('click', function(e) {
                e.preventDefault();
                triggerSnap();
            });
        });
    </script>
</x-layouts.public>
