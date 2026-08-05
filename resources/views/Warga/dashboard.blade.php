@extends('layouts.superadmin')

@section('title', 'Dashboard Warga')

@section('content')
    <div class="mb-8">
        <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
            Dashboard Warga</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Selamat datang, {{ auth()->user()->NamaLengkap }}!</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6">
            <div class="flex items-center gap-3 mb-3">
                <span class="material-symbols-outlined text-primary text-3xl">person</span>
                <h3 class="font-headline-md text-headline-md text-on-surface">Profil</h3>
            </div>
            <p class="font-body-sm text-on-surface-variant">Kelola data pribadi Anda.</p>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6">
            <div class="flex items-center gap-3 mb-3">
                <span class="material-symbols-outlined text-secondary text-3xl">home</span>
                <h3 class="font-headline-md text-headline-md text-on-surface">Rumah</h3>
            </div>
            <p class="font-body-sm text-on-surface-variant">Data rumah dan alamat Anda.</p>
        </div>
        <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6">
            <div class="flex items-center gap-3 mb-3">
                <span class="material-symbols-outlined text-tertiary text-3xl">settings</span>
                <h3 class="font-headline-md text-headline-md text-on-surface">Pengaturan</h3>
            </div>
            <p class="font-body-sm text-on-surface-variant">Ubah password dan pengaturan lainnya.</p>
        </div>
    </div>
@endsection