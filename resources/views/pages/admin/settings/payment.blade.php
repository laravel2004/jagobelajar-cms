<x-layouts.admin>
    <x-slot name="title">Payment Gateway Settings</x-slot>

    <div class="px-5 py-6">
        <div class="mb-6 flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-[#141b2c]">Payment Gateway Settings</h1>
                <p class="mt-1 text-sm text-[#8a93a8]">Pilih payment gateway yang akan aktif digunakan untuk transaksi.</p>
            </div>
        </div>

        @if(session('success'))
            <div class="mb-4 rounded-xl bg-green-50 p-4 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        <div class="rounded-2xl border border-[#e6eaf5] bg-white p-6 shadow-sm">
            <form action="{{ route('admin.settings.payment.update') }}" method="POST">
                @csrf
                
                <div class="mb-6">
                    <label class="mb-3 block text-sm font-semibold text-[#141b2c]">Active Payment Gateway</label>
                    <div class="space-y-3">
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#e6eaf5] p-4 transition hover:bg-[#f9f9ff]">
                            <input type="radio" name="active_payment_gateway" value="midtrans" class="h-5 w-5 text-[#0043c6]" {{ $activeGateway === 'midtrans' ? 'checked' : '' }}>
                            <div>
                                <p class="font-bold text-[#141b2c]">Midtrans</p>
                                <p class="text-sm text-[#8a93a8]">Payment gateway Midtrans (Default).</p>
                            </div>
                        </label>
                        <label class="flex cursor-pointer items-center gap-3 rounded-xl border border-[#e6eaf5] p-4 transition hover:bg-[#f9f9ff]">
                            <input type="radio" name="active_payment_gateway" value="doku" class="h-5 w-5 text-[#0043c6]" {{ $activeGateway === 'doku' ? 'checked' : '' }}>
                            <div>
                                <p class="font-bold text-[#141b2c]">Doku</p>
                                <p class="text-sm text-[#8a93a8]">Payment gateway Doku (Alternative / Fallback).</p>
                            </div>
                        </label>
                    </div>
                    @error('active_payment_gateway')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <button type="submit" class="rounded-xl bg-[#0043c6] px-6 py-3 text-sm font-semibold text-white transition hover:bg-[#0038a8]">
                    Simpan Pengaturan
                </button>
            </form>
        </div>
    </div>
</x-layouts.admin>
