<x-layouts.public :title="'Login - '.config('app.name')">
    <section class="relative overflow-hidden bg-[#f9f9ff] py-12 sm:py-16">
        <div class="absolute inset-0 bg-[radial-gradient(circle_at_80%_12%,rgba(254,183,0,0.24),transparent_30%),radial-gradient(circle_at_12%_20%,rgba(30,90,240,0.18),transparent_34%)]"></div>
        <div class="jb-container relative grid items-center gap-6 sm:p-8 lg:grid-cols-[1fr_440px]">
            <div class="max-w-2xl">
                <span class="inline-flex rounded-full bg-[#dce1ff] px-4 py-2 text-xs font-extrabold text-[#0043c6]">Selamat datang kembali</span>
                <h1 class="mt-5 text-4xl font-extrabold tracking-tight text-[#141b2c] sm:text-4xl sm:text-5xl">Masuk dan lanjutkan belajar</h1>
                <p class="mt-4 text-sm leading-7 text-[#5f667d] sm:text-base">Gunakan satu akun untuk mengakses dashboard, try out, bimbel, dan progres belajar Jago Belajar.</p>
            </div>

            <div class="rounded-[2rem] bg-white p-6 shadow-[0_18px_50px_rgba(20,27,44,0.14)] ring-1 ring-[#e9edff] sm:p-6 sm:p-8">
                <h2 class="text-2xl font-extrabold text-[#141b2c]">Login</h2>
                <p class="mt-2 text-sm leading-6 text-[#5f667d]">Admin masuk ke dashboard admin, user biasa masuk ke dashboard user.</p>

                @if ($errors->any())
                    <div class="mt-4 rounded-2xl bg-red-50 p-4 text-sm font-semibold text-red-700">{{ $errors->first() }}</div>
                @endif

                <form class="mt-6 space-y-4" method="POST" action="{{ route('login.store') }}">
                    @csrf
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Email</label>
                        <input name="email" type="email" value="{{ old('email') }}" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="nama@email.com" required>
                    </div>
                    <div>
                        <label class="mb-2 block text-sm font-bold text-[#141b2c]">Password</label>
                        <input name="password" type="password" class="w-full rounded-2xl border border-[#d9def1] bg-[#f9f9ff] px-4 py-3 outline-none transition focus:border-[#0043c6] focus:bg-white" placeholder="Masukkan password" required>
                    </div>
                    <label class="flex items-center gap-2 text-sm text-[#5f667d]"><input type="checkbox" name="remember" class="rounded border-[#d9def1]"> Ingat saya</label>
                    <button class="w-full rounded-2xl bg-[#0043c6] px-5 py-4 text-sm font-extrabold text-white shadow-[0_14px_24px_rgba(0,67,198,0.22)] transition hover:bg-[#003ab1]">Masuk</button>
                </form>
                <p class="mt-5 text-center text-sm text-[#5f667d]">Belum punya akun? <a class="font-extrabold text-[#0043c6]" href="{{ route('register') }}">Daftar sekarang</a></p>
            </div>
        </div>
    </section>
</x-layouts.public>
