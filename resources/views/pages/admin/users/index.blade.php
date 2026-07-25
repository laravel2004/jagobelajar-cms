<x-layouts.admin :title="'User - '.config('app.name')">
    <div class="space-y-6">
        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">User Management</span>
                <h1 class="mt-4 text-3xl font-extrabold tracking-tight sm:text-4xl">User</h1>
                <p class="mt-3 max-w-2xl text-sm leading-7 text-white/80">Lihat daftar user dan paket yang sudah mereka daftarkan.</p>
            </div>
        </section>

        <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
            <div class="border-b border-[#e6eaf5] bg-white p-4 sm:p-5 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                <div>
                    <h3 class="text-lg font-extrabold text-[#141b2c]">Daftar User</h3>
                    <p class="text-sm text-[#8a93a8]">Semua pengguna terdaftar.</p>
                </div>
                
                <div class="flex items-center gap-3 w-full sm:w-auto">
                    <form action="{{ route('admin.users.index') }}" method="GET" class="relative flex-1 sm:min-w-[300px]">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama atau email..." class="w-full rounded-2xl border border-[#e6eaf5] bg-[#f9f9ff] py-2.5 pl-10 pr-10 text-sm text-[#141b2c] transition focus:border-[#0043c6] focus:bg-white focus:outline-none focus:ring-1 focus:ring-[#0043c6]">
                        <svg class="absolute left-3.5 top-1/2 h-5 w-5 -translate-y-1/2 text-[#8a93a8]" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>
                        @if (request('search'))
                            <a href="{{ route('admin.users.index') }}" class="absolute right-3.5 top-1/2 -translate-y-1/2 text-[#8a93a8] hover:text-[#141b2c]">
                                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                                </svg>
                            </a>
                        @endif
                    </form>
                    <span class="hidden sm:inline-flex rounded-full bg-[#f1f3ff] px-4 py-2 text-xs font-bold uppercase tracking-[0.16em] text-[#0043c6] whitespace-nowrap">{{ $users->total() }} User</span>
                </div>
            </div>

            <div class="divide-y divide-[#e9edff]">
                @forelse ($users as $user)
                    <div class="flex flex-col gap-4 p-4 sm:p-6 md:flex-row md:items-center md:justify-between">
                        <div class="flex min-w-0 items-start gap-4">
                            <span class="grid h-12 w-12 shrink-0 place-items-center rounded-2xl bg-[#f1f3ff] text-sm font-extrabold text-[#0043c6] ring-1 ring-[#d9def1]">{{ strtoupper(substr($user->name, 0, 1)) }}</span>
                            <div class="min-w-0">
                                <h2 class="truncate text-lg font-extrabold text-[#141b2c]">{{ $user->name }}</h2>
                                <p class="mt-1 break-all text-sm text-[#5f667d]">{{ $user->email }}</p>
                                <div class="mt-2 flex flex-wrap gap-2 text-xs font-bold uppercase tracking-[0.14em]">
                                    <span class="rounded-full bg-[#f1f3ff] px-3 py-1 text-[#0043c6]">{{ $user->role }}</span>
                                    <span class="rounded-full bg-[#fff8df] px-3 py-1 text-[#7c5800]">{{ $user->packages_count }} Paket</span>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('admin.users.show', $user) }}" class="inline-flex justify-center rounded-xl bg-[#0043c6] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#003ab1]">Show</a>
                    </div>
                @empty
                    <div class="p-6 text-sm text-[#5f667d]">Belum ada user.</div>
                @endforelse
            </div>
        </section>

        {{ $users->links() }}
    </div>
</x-layouts.admin>
