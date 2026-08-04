<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Login - Manajemen Warga</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet" />
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link crossorigin="" href="https://fonts.gstatic.com" rel="preconnect" />
    <link
        href="https://fonts.googleapis.com/css2?family=Geist:wght@400;600;700&amp;family=Inter:wght@400;500;600&amp;display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
</head>

<body
    class="bg-surface-bright min-h-screen flex items-center justify-center p-container-padding-mobile md:p-container-padding-desktop relative overflow-hidden">
    <!-- Decorative ambient background glow -->
    <div
        class="absolute top-0 left-0 w-full h-full pointer-events-none overflow-hidden z-0 flex items-center justify-center">
        <div
            class="w-[800px] h-[800px] rounded-full bg-primary-fixed opacity-30 blur-[100px] transform -translate-y-1/4">
        </div>
    </div>
    <!-- Login Card -->
    <main
        class="w-full max-w-md bg-surface-container-lowest rounded-xl border border-outline-variant shadow-sm relative z-10 p-8 flex flex-col gap-8">
        <!-- Header -->
        <header class="flex flex-col items-center gap-4 text-center">
            <div
                class="w-16 h-16 rounded-2xl bg-primary-container flex items-center justify-center text-on-primary-container mb-2">
                <span class="material-symbols-outlined text-4xl icon-filled">admin_panel_settings</span>
            </div>
            <div>
                <h1
                    class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-primary">
                    Manajemen Warga</h1>
                <p class="font-body-sm text-body-sm text-on-surface-variant mt-2">Sistem Informasi &amp; Administrasi
                    Terpadu</p>
            </div>
        </header>
        <!-- Form -->
        <form class="flex flex-col gap-stack-gap" action="{{ route('login.attempt') }}" method="POST">
            @csrf
            <!-- Role Selection -->
            <div class="flex flex-col gap-base">
                <label class="font-label-caps text-label-caps text-on-surface-variant" for="role">Peran Pengguna</label>
                <div class="relative custom-select-wrapper">
                    <select
                        class="w-full h-[48px] rounded-lg border border-outline-variant bg-surface px-4 font-body-lg text-body-lg text-on-surface appearance-none focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors cursor-pointer"
                        id="role" name="role">
                        <option value="warga">Warga</option>
                        <option value="rt">RT</option>
                        <option value="ketua_pemuda">Ketua Pemuda</option>
                        <option value="bendahara">Bendahara</option>
                        <option value="super_admin">Super Admin</option>
                    </select>
                </div>
            </div>
            <!-- Username/Email -->
            <div class="flex flex-col gap-base">
                <label class="font-label-caps text-label-caps text-on-surface-variant" for="username">Username atau
                    Email</label>
                <div class="relative">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline pointer-events-none">person</span>
                    <input
                        class="w-full h-[48px] rounded-lg border border-outline-variant bg-surface pl-12 pr-4 font-body-lg text-body-lg text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                        id="username" name="username" placeholder="Masukkan identitas anda" type="text"
                        value="{{ old('username') }}" />
                    @error('username')
                        <p class="font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            <!-- Password -->
            <div class="flex flex-col gap-base">
                <div class="flex justify-between items-center">
                    <label class="font-label-caps text-label-caps text-on-surface-variant" for="password">Kata
                        Sandi</label>
                    <a class="font-label-caps text-label-caps text-primary hover:text-on-primary-fixed-variant transition-colors"
                        href="#">Lupa Password?</a>
                </div>
                <div class="relative">
                    <span
                        class="material-symbols-outlined absolute left-4 top-1/2 -translate-y-1/2 text-outline pointer-events-none">lock</span>
                    <input
                        class="w-full h-[48px] rounded-lg border border-outline-variant bg-surface pl-12 pr-12 font-body-lg text-body-lg text-on-surface placeholder:text-outline focus:outline-none focus:border-primary focus:ring-1 focus:ring-primary transition-colors"
                        id="password" name="password" placeholder="••••••••" type="password" />
                    @error('password')
                        <p class="font-body-sm text-body-sm text-error">{{ $message }}</p>
                    @enderror
                    <button aria-label="Toggle password visibility"
                        class="absolute right-4 top-1/2 -translate-y-1/2 text-outline hover:text-on-surface transition-colors focus:outline-none"
                        type="button">
                        <span class="material-symbols-outlined">visibility_off</span>
                    </button>
                </div>
            </div>
            <!-- Actions -->
            <div class="pt-4">
                <button
                    class="w-full h-[48px] bg-primary text-on-primary rounded-lg font-headline-md text-headline-md hover:bg-on-primary-fixed-variant transition-colors flex items-center justify-center gap-2 shadow-sm active:scale-[0.98]"
                    type="submit">
                    <span>Masuk</span>
                    <span class="material-symbols-outlined text-lg">arrow_forward</span>
                </button>
            </div>
        </form>
    </main>
</body>

</html>