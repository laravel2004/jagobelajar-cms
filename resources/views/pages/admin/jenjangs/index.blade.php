<x-layouts.admin :title="'Master Jenjang - '.config('app.name')">
    <div class="space-y-6" x-data="{ editing: null, editName: '', editSlug: '' }">
        @if (session('status'))
            <div class="rounded-2xl bg-emerald-50 px-4 py-3 text-sm font-medium text-emerald-700 ring-1 ring-emerald-100">{{ session('status') }}</div>
        @endif
        @if ($errors->any())
            <div class="rounded-2xl bg-rose-50 px-4 py-3 text-sm font-medium text-rose-700 ring-1 ring-rose-100">
                <ul class="list-disc pl-5">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <div class="lg:col-span-1">
                <section class="rounded-[2rem] bg-white p-6 shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
                    <h2 class="text-xl font-extrabold text-[#141b2c]">Tambah Jenjang</h2>
                    <form method="POST" action="{{ route('admin.jenjangs.store') }}" class="mt-4 space-y-4">
                        @csrf
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Nama Jenjang</label>
                            <input type="text" name="name" required class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-[#0043c6] focus:outline-none focus:ring-1 focus:ring-[#0043c6]">
                        </div>
                        <div>
                            <label class="mb-1 block text-sm font-medium text-gray-700">Slug (Opsional)</label>
                            <input type="text" name="slug" class="w-full rounded-lg border border-gray-300 p-2.5 text-sm focus:border-[#0043c6] focus:outline-none focus:ring-1 focus:ring-[#0043c6]">
                        </div>
                        <button class="w-full rounded-xl bg-[#0043c6] px-4 py-2.5 text-sm font-bold text-white transition hover:bg-[#1e5af0]">Simpan</button>
                    </form>
                </section>
            </div>

            <div class="lg:col-span-2">
                <section class="overflow-hidden rounded-[2rem] bg-white shadow-[0_18px_55px_rgba(20,27,44,0.08)] ring-1 ring-[#e6eaf5]">
                    <div class="relative bg-[radial-gradient(circle_at_85%_10%,rgba(254,183,0,0.35),transparent_28%),linear-gradient(135deg,#0b2f8f,#0043c6_48%,#1e5af0)] p-6 text-white sm:p-8">
                        <span class="rounded-full bg-white/15 px-3 py-1 text-xs font-bold uppercase tracking-[0.2em] ring-1 ring-white/20">CMS Module</span>
                        <div class="flex flex-col sm:flex-row sm:items-end justify-between gap-4 mt-4">
                            <div>
                                <h1 class="text-3xl font-extrabold tracking-tight sm:text-4xl">Master Jenjang</h1>
                                <p class="mt-3 text-sm leading-7 text-white/80">Kelola jenjang pendidikan untuk paket dan sesi ujian.</p>
                            </div>
                            <form method="GET" action="{{ route('admin.jenjangs.index') }}" class="relative w-full sm:w-64">
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari jenjang..." class="w-full rounded-xl bg-white/10 px-4 py-2.5 pl-10 text-sm text-white placeholder-white/60 ring-1 ring-white/20 focus:outline-none focus:ring-2 focus:ring-white/40 backdrop-blur-md">
                                <svg class="absolute left-3 top-1/2 h-4 w-4 -translate-y-1/2 text-white/60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </form>
                        </div>
                    </div>

                    <div class="divide-y divide-[#e9edff]">
                        @forelse ($jenjangs as $jenjang)
                            <div class="p-4 sm:p-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                                <div class="min-w-0" x-show="editing !== {{ $jenjang->id }}">
                                    <h2 class="text-lg font-extrabold text-[#141b2c]">{{ $jenjang->name }}</h2>
                                    <p class="text-sm text-[#8a93a8]">{{ $jenjang->slug }}</p>
                                </div>
                                <div class="flex gap-2" x-show="editing !== {{ $jenjang->id }}">
                                    <button type="button" @click="editing = {{ $jenjang->id }}; editName = '{{ addslashes($jenjang->name) }}'; editSlug = '{{ addslashes($jenjang->slug) }}'" class="rounded-xl bg-[#f1f3ff] px-4 py-2 text-sm font-bold text-[#0043c6]">Edit</button>
                                    <form method="POST" action="{{ route('admin.jenjangs.destroy', $jenjang) }}" onsubmit="return confirm('Hapus jenjang ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="rounded-xl bg-rose-50 px-4 py-2 text-sm font-bold text-rose-600">Hapus</button>
                                    </form>
                                </div>

                                <form method="POST" action="{{ route('admin.jenjangs.update', $jenjang) }}" x-show="editing === {{ $jenjang->id }}" class="flex flex-col sm:flex-row gap-3 w-full" style="display: none;">
                                    @csrf
                                    @method('PUT')
                                    <input type="text" name="name" x-model="editName" required class="w-full rounded-lg border border-gray-300 p-2 text-sm">
                                    <input type="text" name="slug" x-model="editSlug" class="w-full rounded-lg border border-gray-300 p-2 text-sm">
                                    <div class="flex gap-2">
                                        <button type="submit" class="rounded-xl bg-[#0043c6] px-4 py-2 text-sm font-bold text-white">Simpan</button>
                                        <button type="button" @click="editing = null" class="rounded-xl bg-gray-100 px-4 py-2 text-sm font-bold text-gray-700">Batal</button>
                                    </div>
                                </form>
                            </div>
                        @empty
                            <div class="p-6 text-sm text-[#5f667d]">Belum ada jenjang.</div>
                        @endforelse
                    </div>
                    @if ($jenjangs->hasPages())
                        <div class="border-t border-[#e9edff] p-4 sm:p-6 bg-gray-50/50">
                            {{ $jenjangs->links() }}
                        </div>
                    @endif
                </section>
            </div>
        </div>
    </div>
</x-layouts.admin>
