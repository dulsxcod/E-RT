<!DOCTYPE html>

<html class="light" lang="id">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>@yield('title', 'Sistem Manajemen Warga')</title>
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>
    <script src="{{ asset('js/tailwind-config.js') }}"></script>
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />
    <link href="{{ asset('css/icons.css') }}" rel="stylesheet" />
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&amp;display=swap"
        rel="stylesheet" />
</head>

<body class="bg-background text-on-background font-body-sm min-h-screen flex">
    @include('SuperAdmin.partials.sidebar')
    <!-- Main Content Wrapper -->
    <main class="flex-1 md:ml-[280px] flex flex-col min-h-screen pb-20 md:pb-0">
        @include('SuperAdmin.partials.header')
        <!-- Dashboard Canvas -->
        <div class="p-container-padding-mobile md:p-container-padding-desktop space-y-gutter">
            @yield('content')
        </div>
    </main>
    @include('SuperAdmin.partials.bottomnav')
    @stack('scripts')
</body>

</html>