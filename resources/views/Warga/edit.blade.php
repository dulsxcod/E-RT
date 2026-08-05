@extends('layouts.superadmin')

@section('title', 'Sistem Manajemen Warga - Edit Warga')

@section('content')
    <div class="mb-8">
        <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
            Edit Warga</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Perbarui data warga.</p>
    </div>

    @if ($errors->any())
        <div class="mb-6 flex items-center gap-3 bg-error/10 border border-error/30 text-error px-4 py-3 rounded-lg">
            <span class="material-symbols-outlined text-sm">error</span>
            <span class="font-body-sm font-medium">{{ $errors->first() }}</span>
        </div>
    @endif

    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <form action="{{ route('super_admin.warga.update', $warga) }}" method="POST" class="p-6 space-y-4">
            @csrf
            @method('PUT')
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">NIK</label>
                    <input type="text" name="NIK" required maxlength="16" value="{{ old('NIK', $warga->NIK) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary font-mono" placeholder="Contoh: 3201011234560001">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" required maxlength="255" value="{{ old('nama_lengkap', $warga->nama_lengkap) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">No HP</label>
                    <input type="text" name="no_hp" required maxlength="15" value="{{ old('no_hp', $warga->no_hp) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Contoh: 081234567890">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">RT</label>
                    <input type="text" name="rt" required maxlength="10" value="{{ old('rt', $warga->rt) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Kelurahan</label>
                    <input type="text" name="kelurahan" required maxlength="255" value="{{ old('kelurahan', $warga->kelurahan) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Kecamatan</label>
                    <input type="text" name="kecamatan" required maxlength="255" value="{{ old('kecamatan', $warga->kecamatan) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Kota</label>
                    <input type="text" name="kota" required maxlength="255" value="{{ old('kota', $warga->kota) }}"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Alamat</label>
                    <textarea name="alamat" required rows="3"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">{{ old('alamat', $warga->alamat) }}</textarea>
                </div>
            </div>
            <div class="flex justify-end gap-2 pt-2">
                <a href="{{ route('super_admin.warga') }}"
                    class="px-4 py-2 rounded-lg font-body-sm text-on-surface-variant hover:bg-surface-container-high transition-colors">Batal</a>
                <button type="submit"
                    class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm hover:bg-primary/90 transition-colors">Simpan Perubahan</button>
            </div>
        </form>
    </div>
@endsection