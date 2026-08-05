@extends('layouts.superadmin')

@section('title', 'Sistem Manajemen Warga - Akun Pending')

@section('content')
    <div class="mb-8">
        <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
            Akun Warga Pending</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Kelola akun warga yang menunggu aktivasi.</p>
    </div>

    @if (session('success'))
        <div class="mb-6 flex items-center gap-3 bg-secondary/10 border border-secondary/30 text-secondary px-4 py-3 rounded-lg">
            <span class="material-symbols-outlined text-sm">check_circle</span>
            <span class="font-body-sm font-medium">{{ session('success') }}</span>
        </div>
    @endif

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 border-b border-outline-variant bg-surface">
            <h3 class="font-headline-md text-headline-md text-on-surface">Menunggu Aktivasi</h3>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-outline-variant bg-surface-container-low text-on-surface-variant font-label-caps text-label-caps">
                        <th class="p-4 font-semibold">NIK</th>
                        <th class="p-4 font-semibold">Nama Lengkap</th>
                        <th class="p-4 font-semibold">No HP</th>
                        <th class="p-4 font-semibold">Tanggal Daftar</th>
                        <th class="p-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-sm text-on-surface">
                    @forelse ($wargas as $warga)
                        <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 transition-colors">
                            <td class="p-4 font-mono text-on-surface-variant">{{ $warga->NIK }}</td>
                            <td class="p-4 font-semibold text-on-surface">{{ $warga->nama_lengkap }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->no_hp }}</td>
                            <td class="p-4 text-on-surface-variant">{{ $warga->created_at->format('d M Y, H:i') }}</td>
                            <td class="p-4">
                                <form action="{{ route('super_admin.warga.activate', $warga) }}" method="POST" class="inline" onsubmit="return confirm('Aktifkan akun warga {{ $warga->nama_lengkap }}?')">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit"
                                        class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm hover:bg-primary/90 transition-colors">Aktifkan</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-10 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-3xl mb-2 block">check_circle</span>
                                Tidak ada akun pending.
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