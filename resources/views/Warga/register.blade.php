@extends('layouts.superadmin')

@section('title', 'Registrasi Warga')

@section('content')
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <h1 class="font-headline-lg text-headline-lg text-on-surface">Registrasi Warga</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Masukkan token aktivasi dan buat password Anda.</p>
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
                <form action="{{ route('warga.register.submit') }}" method="POST" class="p-6 space-y-4">
                    @csrf
                    <div>
                        <label class="font-body-sm font-semibold text-on-surface mb-1 block">Token Aktivasi</label>
                        <input type="text" name="token" required maxlength="255"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm font-mono focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Masukkan token dari WhatsApp">
                    </div>
                    <div>
                        <label class="font-body-sm font-semibold text-on-surface mb-1 block">Password</label>
                        <input type="password" name="password" required minlength="6" maxlength="15"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Min. 6 karakter">
                    </div>
                    <div>
                        <label class="font-body-sm font-semibold text-on-surface mb-1 block">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" required minlength="6" maxlength="15"
                            class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary" placeholder="Ulangi password">
                    </div>
                    <button type="submit"
                        class="w-full bg-primary text-on-primary px-4 py-3 rounded-lg font-body-sm font-semibold hover:bg-primary/90 transition-colors">
                        Aktifkan Akun
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection