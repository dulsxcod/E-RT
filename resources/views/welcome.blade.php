<!DOCTYPE html>

<html lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Manajemen Warga - Transformasi Digital Lingkungan</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link href="{{ asset('css/welcome.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
</head>

<body class="bg-background text-on-background font-body-sm antialiased overflow-x-hidden">
    <!-- TopNavBar -->
    <header
        class="fixed top-0 w-full z-50 flex justify-between items-center px-container-padding-mobile md:px-container-padding-desktop h-16 bg-surface-container-lowest border-b border-outline-variant">
        <div class="font-headline-md text-headline-md font-bold text-primary">
            Manajemen Warga
        </div>
        <nav class="hidden md:flex gap-6">
            <a class="text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Fitur</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Tentang</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Layanan</a>
            <a class="text-on-surface-variant hover:text-primary transition-colors duration-200" href="#">Kontak</a>
        </nav>
        <a class="hidden md:block bg-primary text-on-primary px-6 py-2 rounded-full font-body-sm font-semibold hover:bg-surface-tint transition-colors duration-200 cursor-pointer active:scale-95"
            href="{{ route('login') }}">
            Login
        </a>
        <!-- Mobile Menu Icon (Placeholder) -->
        <button class="md:hidden text-on-surface-variant">
            <span class="material-symbols-outlined">menu</span>
        </button>
    </header>
    <!-- Main Content -->
    <main class="pt-24 pb-16">
        <!-- Hero Section -->
        <section
            class="px-container-padding-mobile md:px-container-padding-desktop flex flex-col md:flex-row items-center justify-between gap-gutter py-12 md:py-24">
            <div class="w-full md:w-1/2 flex flex-col gap-stack-gap text-center md:text-left z-10">
                <h1
                    class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface">
                    Transformasi Digital Manajemen Lingkungan Anda
                </h1>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-lg mx-auto md:mx-0">
                    Sistem Manajemen Warga memberikan transparansi, efisiensi, dan kemudahan dalam mengelola
                    administrasi RT/RW, iuran, dan kegiatan lingkungan dalam satu platform terpusat.
                </p>
                <div class="flex gap-4 justify-center md:justify-start mt-4">
                    <button
                        class="bg-primary-container text-on-primary-container px-8 py-3 rounded-full font-body-sm font-semibold shadow-sm hover:bg-primary hover:text-on-primary transition-all duration-300">
                        Mulai Sekarang
                    </button>
                    <button
                        class="bg-surface-container-lowest text-primary px-8 py-3 rounded-full font-body-sm font-semibold border border-outline-variant hover:bg-surface-container-low transition-colors duration-300">
                        Pelajari Lebih Lanjut
                    </button>
                </div>
            </div>
            <div
                class="w-full md:w-1/2 h-64 md:h-[400px] rounded-xl overflow-hidden shadow-sm border border-outline-variant relative">
                <img class="w-full h-full object-cover"
                    data-alt="A clean, modern dashboard interface for a community management system displayed on a sleek laptop screen. The UI shows charts, resident lists, and activity logs in a bright, light-mode aesthetic with blue accents. The laptop is placed on a tidy, minimalist desk with a small green potted plant beside it. The lighting is bright and natural, conveying a sense of efficiency and clarity."
                    src="https://lh3.googleusercontent.com/aida-public/AB6AXuCEWzhGdUE0rGqRmz6rORIJNldEQHHO7_c4yF8qyu-MUrl4iJ9-foKygiM0tamy4zC5KrdyelPlnPlUBglbIFGiJ8m_KYA56UgdYi4Jewyfe7rKVjGcivhXYgOaW-lnUrSyPg1avJfs2_07tmMvGMkGdGCcuUqvwrNTGJdD6Z7Q6IxSoj2C7aaernW_S5U-UrVMFf75gYEBpcz1kNc1rGqVlNHsNjj8KFlmx1ypxBW8GOvaLiCyxoMdgQ" />
            </div>
        </section>
        <!-- Statistics / Impact Section -->
        <section class="bg-surface-container-low py-16 mt-8">
            <div class="px-container-padding-mobile md:px-container-padding-desktop">
                <div class="grid grid-cols-1 md:grid-cols-3 gap-gutter text-center">
                    <div
                        class="flex flex-col items-center p-6 bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-primary mb-4">maps_home_work</span>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface mb-2">1000+</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant font-semibold">RT Terintegrasi</p>
                    </div>
                    <div
                        class="flex flex-col items-center p-6 bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-primary mb-4">groups</span>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface mb-2">50k+</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant font-semibold">Warga Aktif</p>
                    </div>
                    <div
                        class="flex flex-col items-center p-6 bg-surface-container-lowest rounded-xl shadow-sm border border-outline-variant">
                        <span class="material-symbols-outlined text-4xl text-primary mb-4">verified_user</span>
                        <h3 class="font-headline-lg text-headline-lg text-on-surface mb-2">100%</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant font-semibold">Transparan</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Key Features Section (Bento Grid Style) -->
        <section class="px-container-padding-mobile md:px-container-padding-desktop py-24">
            <div class="text-center mb-16">
                <h2
                    class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface mb-4">
                    Solusi Terpadu untuk Setiap Peran</h2>
                <p class="font-body-lg text-body-lg text-on-surface-variant max-w-2xl mx-auto">Platform kami dirancang
                    khusus untuk memenuhi kebutuhan berbagai peran dalam manajemen lingkungan.</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-gutter">
                <!-- Warga -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl border-t-4 border-primary shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-primary-container rounded-full flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-on-primary-container icon-filled">person</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Warga</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Kemudahan pengajuan surat pengantar,
                        pembayaran iuran, dan akses informasi lingkungan secara real-time.</p>
                </div>
                <!-- RT -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl border-t-4 border-secondary shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-secondary-container rounded-full flex items-center justify-center mb-4">
                        <span
                            class="material-symbols-outlined text-on-secondary-container icon-filled">admin_panel_settings</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Pengurus RT</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Persetujuan dokumen yang cepat,
                        manajemen data warga yang akurat, dan pelaporan yang mudah.</p>
                </div>
                <!-- Bendahara -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl border-t-4 border-tertiary shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-tertiary-container rounded-full flex items-center justify-center mb-4">
                        <span
                            class="material-symbols-outlined text-on-tertiary-container icon-filled">account_balance_wallet</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Bendahara</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Pencatatan cashflow otomatis, tracking
                        iuran warga, dan transparansi keuangan lingkungan.</p>
                </div>
                <!-- Pemuda/Kegiatan -->
                <div
                    class="bg-surface-container-lowest p-6 rounded-xl border-t-4 border-surface-tint shadow-sm hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 bg-surface-container-high rounded-full flex items-center justify-center mb-4">
                        <span class="material-symbols-outlined text-primary icon-filled">event</span>
                    </div>
                    <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Seksi Kegiatan</h3>
                    <p class="font-body-sm text-body-sm text-on-surface-variant">Perencanaan acara komunitas, manajemen
                        partisipasi, dan publikasi kegiatan lingkungan.</p>
                </div>
            </div>
        </section>
        <!-- How it Works Section -->
        <section class="bg-surface py-24 border-t border-outline-variant">
            <div class="px-container-padding-mobile md:px-container-padding-desktop">
                <div class="text-center mb-16">
                    <h2
                        class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-surface mb-4">
                        Cara Kerja Sederhana</h2>
                    <p class="font-body-lg text-body-lg text-on-surface-variant">Mulai kelola lingkungan Anda secara
                        digital hanya dalam 3 langkah mudah.</p>
                </div>
                <div class="flex flex-col md:flex-row justify-center items-start gap-12 relative">
                    <!-- Connector Line (Desktop) -->
                    <div class="hidden md:block absolute top-8 left-1/6 right-1/6 h-0.5 bg-outline-variant z-0"></div>
                    <div class="flex flex-col items-center text-center z-10 w-full md:w-1/3">
                        <div
                            class="w-16 h-16 bg-primary text-on-primary rounded-full flex items-center justify-center font-headline-md text-headline-md mb-6 border-4 border-surface shadow-sm">
                            1
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Daftar</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Registrasikan lingkungan atau akun
                            warga Anda melalui portal kami dengan cepat.</p>
                    </div>
                    <div class="flex flex-col items-center text-center z-10 w-full md:w-1/3">
                        <div
                            class="w-16 h-16 bg-primary text-on-primary rounded-full flex items-center justify-center font-headline-md text-headline-md mb-6 border-4 border-surface shadow-sm">
                            2
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Verifikasi</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Data akan diverifikasi oleh sistem
                            atau pengurus RT untuk memastikan keamanan.</p>
                    </div>
                    <div class="flex flex-col items-center text-center z-10 w-full md:w-1/3">
                        <div
                            class="w-16 h-16 bg-primary text-on-primary rounded-full flex items-center justify-center font-headline-md text-headline-md mb-6 border-4 border-surface shadow-sm">
                            3
                        </div>
                        <h3 class="font-headline-md text-headline-md text-on-surface mb-2">Gunakan</h3>
                        <p class="font-body-sm text-body-sm text-on-surface-variant">Nikmati kemudahan layanan
                            administrasi dan informasi lingkungan di ujung jari Anda.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- CTA Banner -->
        <section class="px-container-padding-mobile md:px-container-padding-desktop py-16">
            <div
                class="bg-primary-container rounded-2xl p-12 text-center flex flex-col items-center relative overflow-hidden">
                <!-- Abstract pattern background -->
                <div
                    class="absolute inset-0 opacity-10 bg-[radial-gradient(circle_at_center,_var(--tw-gradient-stops))] from-white to-transparent pointer-events-none">
                </div>
                <h2
                    class="font-headline-lg-mobile text-headline-lg-mobile md:font-headline-lg md:text-headline-lg text-on-primary-container mb-4 relative z-10">
                    Siap Mendigitalkan Lingkungan Anda?</h2>
                <p class="font-body-lg text-body-lg text-on-primary-container/90 mb-8 max-w-2xl relative z-10">
                    Bergabunglah dengan ribuan RT/RW lainnya yang telah bertransformasi. Tingkatkan transparansi dan
                    efisiensi manajemen warga hari ini.</p>
                <div class="flex flex-col sm:flex-row gap-4 relative z-10">
                    <button
                        class="bg-on-primary-container text-primary-container px-8 py-3 rounded-full font-body-sm font-semibold hover:bg-white transition-colors duration-200">
                        Daftar Gratis
                    </button>
                    <button
                        class="bg-transparent text-on-primary-container px-8 py-3 rounded-full font-body-sm font-semibold border border-on-primary-container hover:bg-on-primary-container/10 transition-colors duration-200">
                        Jadwalkan Demo
                    </button>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer
        class="w-full py-12 px-container-padding-desktop flex flex-col md:flex-row justify-between items-start gap-gutter bg-surface-container-high">
        <div class="flex flex-col gap-4">
            <div class="font-headline-md text-headline-md font-bold text-on-surface">
                Sistem Manajemen Warga
            </div>
            <p class="font-body-sm text-body-sm text-on-surface-variant max-w-xs">
                Profesionalitas dalam Pelayanan Komunitas. Membangun lingkungan yang transparan dan terhubung.
            </p>
            <p class="font-body-sm text-body-sm text-on-surface-variant mt-4">
                © 2024 Sistem Manajemen Warga.
            </p>
        </div>
        <div class="flex flex-col gap-2">
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-all"
                href="#">Kebijakan Privasi</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-all"
                href="#">Syarat &amp; Ketentuan</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-all"
                href="#">Bantuan</a>
            <a class="font-body-sm text-body-sm text-on-surface-variant hover:text-primary transition-all"
                href="#">FAQ</a>
        </div>
    </footer>
</body>

</html>