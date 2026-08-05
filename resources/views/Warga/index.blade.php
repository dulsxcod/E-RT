@extends('layouts.superadmin')

@section('title', 'Sistem Manajemen Warga - Data Warga')

@section('content')
    <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
                Data Warga</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Kelola data warga dan akun akses sistem.
            </p>
        </div>
        <a href="{{ route('super_admin.warga.create') }}"
            class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm flex items-center gap-2 hover:bg-primary/90 transition-colors w-fit">
            <span class="material-symbols-outlined text-sm">add</span> Tambah Warga
        </a>
    </div>

    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 bg-secondary/10 border border-secondary/30 text-secondary px-4 py-3 rounded-lg">
            <span class="material-symbols-outlined text-sm">check_circle</span>
            <span class="font-body-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif
    @if ($errors->any())
        <div class="mb-6 flex items-center gap-3 bg-error/10 border border-error/30 text-error px-4 py-3 rounded-lg">
            <span class="material-symbols-outlined text-sm">error</span>
            <span class="font-body-sm font-medium">{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 border-b border-outline-variant bg-surface flex flex-col md:flex-row md:items-center gap-4">
            <h3 class="font-headline-md text-headline-md text-on-surface">Daftar Warga</h3>
            <form action="{{ route('super_admin.warga') }}" method="GET" class="md:ml-auto flex items-center gap-2">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-base">search</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari NIK atau nama..."
                        class="w-full md:w-64 bg-surface-container-low border border-outline-variant rounded-lg pl-10 pr-4 py-2 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <button type="submit"
                    class="bg-surface-container-high text-on-surface px-4 py-2 rounded-lg font-body-sm hover:bg-surface-container-highest transition-colors">Cari</button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-outline-variant bg-surface-container-low text-on-surface-variant font-label-caps text-label-caps">
                        <th class="p-4 font-semibold">NIK</th>
                        <th class="p-4 font-semibold">Nama Lengkap</th>
                        <th class="p-4 font-semibold">No HP</th>
                        <th class="p-4 font-semibold">Alamat</th>
                        <th class="p-4 font-semibold">RT</th>
                        <th class="p-4 font-semibold">Kelurahan</th>
                        <th class="p-4 font-semibold">Status</th>
                        <th class="p-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-sm text-on-surface">
                    @forelse ($wargas as $warga)
                        <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 transition-colors">
                            <td class="p-4 font-mono text-on-surface-variant">{{ $warga->NIK }}</td>
                            <td class="p-4 font-semibold text-on-surface">{{ $warga->nama_lengkap }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->no_hp }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->alamat }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->rt }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->kelurahan }}</td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ $warga->status === 'active' ? 'bg-secondary/10 text-secondary' : 'bg-tertiary/10 text-tertiary' }}">
                                    {{ $warga->status === 'active' ? 'Aktif' : 'Pending' }}
                                </span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <a href="{{ route('super_admin.warga.edit', $warga) }}"
                                        class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors" title="Edit">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </a>
                                    <form action="{{ route('super_admin.warga.destroy', $warga) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus data warga ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-error hover:bg-error/10 p-2 rounded-full transition-colors" title="Hapus">
                                            <span class="material-symbols-outlined text-base">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="p-10 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-3xl mb-2 block">people</span>
                                Tidak ada data warga ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($wargas->hasPages())
            <div class="p-4 border-t border-outline-variant">
                {{ $wargas->links() }}
            </div>
        @endif
    </div>
@endsection