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
