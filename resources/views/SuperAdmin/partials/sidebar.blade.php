<!-- Navigation Drawer (Desktop) -->
<nav
    class="bg-surface-container-low h-full w-[280px] fixed left-0 top-0 border-r border-outline-variant hidden md:flex flex-col p-4 gap-2 z-40">
    <!-- Profile Header -->
    <div class="flex items-center gap-4 p-4 mb-6 border-b border-outline-variant/50">
        <img class="w-12 h-12 rounded-full object-cover"
            src="{{ auth()->user()->Foto ? asset('storage/' . auth()->user()->Foto) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDJqskKlrdOU9uzBdonvOgsJL4EtfCTngM5_lYUKBe-Gk2qnnK0X-UXfPk8bd2zbWVmIhbUu5o3w-Kmk8IqnsF3sn3hYWF6pXFuXZ5qiMIGNGGO6qxhLVf-WoR7oitS-JpDav3pl9FV2uHlQexMCSBnDaZvKo0n_C2UGeJSTz6tbklCAL9_hpNGqnqEJXeoEAYWweeY_SkNE8_AgZs4owNPgtc4FzqF07X4YEzToB-zV_1qkmzjgd1hdA' }}" />
        <div class="flex flex-col">
            <span class="font-headline-md text-headline-md text-on-surface">{{ auth()->user()->NamaLengkap ?: auth()->user()->Username }}</span>
            <span class="font-body-sm text-body-sm text-on-surface-variant font-medium">{{ auth()->user()->Role }}</span>
            <span class="text-[10px] text-outline mt-1 uppercase tracking-wider">Sistem Manajemen Warga</span>
        </div>
    </div>
    <!-- Navigation Links -->
    <a class="flex items-center gap-4 rounded-lg px-4 py-3 font-semibold border-l-4 border-transparent transition-all duration-200 {{ request()->routeIs('dashboard.super_admin') ? 'bg-primary-container text-on-primary-container border-primary' : 'text-on-surface-variant hover:bg-surface-container-highest' }}"
        href="{{ route('dashboard.super_admin') }}">
        <span class="material-symbols-outlined {{ request()->routeIs('dashboard.super_admin') ? 'icon-filled' : '' }}">dashboard</span>
        <span class="font-body-lg text-body-lg">Dashboard</span>
    </a>
    <div class="group">
        <button
            class="w-full flex items-center gap-4 px-4 py-3 transition-all duration-200 rounded-lg cursor-pointer {{ request()->routeIs('super_admin.user') ? 'bg-primary-container text-on-primary-container font-semibold border-l-4 border-primary' : 'text-on-surface-variant hover:bg-surface-container-highest border-l-4 border-transparent' }}"
            type="button">
            <span class="material-symbols-outlined {{ request()->routeIs('super_admin.user') ? 'icon-filled' : '' }}">database</span>
            <span class="font-body-lg text-body-lg flex-1 text-left">Master Data</span>
            <span class="material-symbols-outlined text-base transition-transform duration-200 group-hover:rotate-180">expand_more</span>
        </button>
        <div class="hidden group-hover:block mt-1 ml-4 pl-3 border-l border-outline-variant space-y-1">
            <a href="{{ route('super_admin.user') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg transition-all duration-200 {{ request()->routeIs('super_admin.user') ? 'bg-primary/10 text-primary font-semibold' : 'text-on-surface-variant hover:bg-surface-container-highest hover:text-on-surface' }}">
                <span class="material-symbols-outlined text-base">manage_accounts</span>
                <span class="font-body-sm text-body-sm">Data User</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-2.5 text-on-surface-variant hover:bg-surface-container-highest hover:text-on-surface transition-all duration-200 rounded-lg"
                href="#">
                <span class="material-symbols-outlined text-base">maps_home_work</span>
                <span class="font-body-sm text-body-sm">Data RT</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-2.5 text-on-surface-variant hover:bg-surface-container-highest hover:text-on-surface transition-all duration-200 rounded-lg"
                href="#">
                <span class="material-symbols-outlined text-base">account_balance_wallet</span>
                <span class="font-body-sm text-body-sm">Data Bendahara</span>
            </a>
            <a class="flex items-center gap-3 px-3 py-2.5 text-on-surface-variant hover:bg-surface-container-highest hover:text-on-surface transition-all duration-200 rounded-lg"
                href="#">
                <span class="material-symbols-outlined text-base">sports_soccer</span>
                <span class="font-body-sm text-body-sm">Data Ketua Pemuda</span>
            </a>
        </div>
    </div>
    <a class="flex items-center gap-4 text-on-surface-variant px-4 py-3 hover:bg-surface-container-highest transition-all duration-200 rounded-lg"
        href="#">
        <span class="material-symbols-outlined">description</span>
        <span class="font-body-lg text-body-lg">Laporan</span>
    </a>
    <a class="flex items-center gap-4 text-on-surface-variant px-4 py-3 hover:bg-surface-container-highest transition-all duration-200 rounded-lg"
        href="#">
        <span class="material-symbols-outlined">receipt_long</span>
        <span class="font-body-lg text-body-lg">Iuran</span>
    </a>
    <a class="flex items-center gap-4 text-on-surface-variant px-4 py-3 hover:bg-surface-container-highest transition-all duration-200 rounded-lg"
        href="#">
        <span class="material-symbols-outlined">account_circle</span>
        <span class="font-body-lg text-body-lg">Profil</span>
    </a>
</nav>