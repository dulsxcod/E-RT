<!-- TopAppBar (Mobile & Desktop Header) -->
<header
    class="bg-surface docked full-width top-0 border-b border-outline-variant flex justify-between items-center w-full px-container-padding-mobile md:px-container-padding-desktop py-4 z-30 sticky top-0">
    <div class="flex items-center gap-3">
        <div class="md:hidden">
            <img class="w-10 h-10 rounded-full bg-surface-variant"
                src="{{ auth()->user()->Foto ? asset('storage/' . auth()->user()->Foto) : 'https://lh3.googleusercontent.com/aida-public/AB6AXuDswJVHfUHZjcWUgtS9BaXDdcAphb9esi0B6GeWYFYfQ2--np0tHUW18CsGpm3iKi-yKfCi9lWVb4ZMWPr3oYf9WiPsE4rmOjep01SrHCA-lTkFZlEil8135lEWuwd8aZqioSHUhZP5GmKCHg05z9gQ6a-rTeByFMTtk5WMH157KnrTRBpWiJC5Jao_5wOv3V1egYDhucur5TWfXRcMciNfWuKH6EipG0vko3p-QE1DT8Q-OGLzG-uzDQ' }}" />
        </div>
        <h1 class="font-headline-md text-headline-md font-bold text-primary">Manajemen Warga</h1>
    </div>
    <button
        class="text-primary hover:bg-surface-container-high transition-colors duration-200 ease-in-out p-2 rounded-full flex items-center justify-center">
        <span class="material-symbols-outlined">notifications</span>
    </button>
</header>