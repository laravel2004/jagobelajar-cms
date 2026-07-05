<x-layouts.admin :title="$user->name.' - User Detail'">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <a href="{{ route('admin.users.index') }}" class="inline-flex text-sm font-bold text-white/80 transition hover:text-white">&larr; Kembali</a>
                <div class="mt-5 flex flex-col gap-5 sm:flex-row sm:items-center">
                    <span class="grid h-16 w-16 shrink-0 place-items-center rounded-3xl bg-white/15 text-2xl font-extrabold text-white ring-1 ring-white/20">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                    <div class="min-w-0">
                        <p class="text-xs font-bold uppercase tracking-[0.18em] text-white/70">Detail User</p>
                        <h1 class="mt-2 break-words text-3xl font-extrabold tracking-tight sm:text-4xl">{{ $user->name }}</h1>
                        <p class="mt-2 break-all text-sm text-white/80">{{ $user->email }}</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="grid gap-6 lg:grid-cols-[360px_1fr]">
            <aside class="h-fit rounded-[2rem] bg-white p-5 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6">
                <h2 class="text-xl font-extrabold text-[#141b2c]">Profil</h2>
                <div class="mt-5 grid gap-3 text-sm text-[#434655]">
                    @foreach ([['Role', ucfirst($user->role)], ['WhatsApp', $user->whatsapp ?: '-'], ['Alamat', $user->address ?: '-'], ['Tanggal Daftar', optional($user->created_at)->format('d M Y') ?: '-']] as [$label, $value])
                        <div class="rounded-2xl bg-[#f9f9ff] px-4 py-3 ring-1 ring-[#e9edff]">
                            <p class="text-xs font-bold uppercase tracking-[0.14em] text-[#8a93a8]">{{ $label }}</p>
                            <p class="mt-1 break-words font-bold text-[#141b2c]">{{ $value }}</p>
                        </div>
                    @endforeach
                </div>
            </aside>

            <div class="rounded-[2rem] bg-white p-5 shadow-[0_14px_40px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5] sm:p-6">
                <div class="flex flex-col gap-2 sm:flex-row sm:items-center sm:justify-between">
                    <div>
                        <h2 class="text-xl font-extrabold text-[#141b2c]">Paket Terdaftar</h2>
                        <p class="text-sm text-[#8a93a8]">Daftar paket yang sudah dibeli atau didaftarkan user.</p>
                    </div>
                    <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]">{{ $user->packages->count() }} Paket</span>
                </div>

                <div class="mt-5 grid gap-4">
                    @forelse ($user->packages as $package)
                        <article class="rounded-3xl bg-[#f9f9ff] p-4 ring-1 ring-[#e9edff] sm:p-5">
                            <div class="flex flex-col gap-4 sm:flex-row sm:items-start sm:justify-between">
                                <div>
                                    <p class="text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6]">{{ $package->package_type }}</p>
                                    <h3 class="mt-2 text-lg font-extrabold text-[#141b2c]">{{ $package->package_name }}</h3>
                                    <p class="mt-1 text-sm text-[#5f667d]">Status: <strong>{{ ucfirst($package->status) }}</strong></p>
                                    <p class="mt-1 text-sm text-[#5f667d]">Tanggal: <strong>{{ optional($package->registered_at)->format('d M Y') ?? '-' }}</strong></p>
                                </div>
                                @if ($package->join_url)
                                    <a href="{{ $package->join_url }}" target="_blank" rel="noopener noreferrer" class="inline-flex justify-center rounded-xl bg-white px-4 py-2 text-xs font-extrabold text-[#0043c6] ring-1 ring-[#d9def1] transition hover:bg-[#f1f3ff]">{{ $package->package_type === 'bimbel' ? 'Masuk ke Forum' : 'Masuk ke Ujian' }}</a>
                                @endif
                            </div>
                        </article>
                    @empty
                        <div class="rounded-2xl bg-[#f9f9ff] p-5 text-sm text-[#5f667d] ring-1 ring-[#e9edff]">User belum punya paket terdaftar.</div>
                    @endforelse
                </div>
            </div>
        </section>
    </div>
</x-layouts.admin>
