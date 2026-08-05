@extends('layouts.superadmin')

@section('title', 'Sistem Manajemen Warga - Super Admin Dashboard')

@section('content')
    <!-- Welcome -->
    <div class="mb-8">
        <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
            Overview Admin</h2>
        <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Ringkasan data operasional lingkungan hari ini.
        </p>
    </div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
        <!-- Stat Card 1 -->
        <div
            class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex flex-col relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-primary/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform">
            </div>
            <span class="material-symbols-outlined text-primary mb-2">group</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Total Warga</span>
            <span class="font-headline-lg text-headline-lg text-on-surface mt-1">1,245</span>
        </div>
        <!-- Stat Card 2 -->
        <div
            class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex flex-col relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-secondary/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform">
            </div>
            <span class="material-symbols-outlined text-secondary mb-2">maps_home_work</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Total RT</span>
            <span class="font-headline-lg text-headline-lg text-on-surface mt-1">12</span>
        </div>
        <!-- Stat Card 3 -->
        <div
            class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex flex-col relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-tertiary/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform">
            </div>
            <span class="material-symbols-outlined text-tertiary mb-2">account_balance_wallet</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Total Kas RW</span>
            <span class="font-headline-lg text-headline-lg text-on-surface mt-1">Rp 45M</span>
        </div>
        <!-- Stat Card 4 -->
        <div
            class="bg-surface-container-lowest border border-outline-variant rounded-xl p-4 flex flex-col relative overflow-hidden group">
            <div
                class="absolute top-0 right-0 w-24 h-24 bg-error/5 rounded-bl-full -z-10 group-hover:scale-110 transition-transform">
            </div>
            <span class="material-symbols-outlined text-error mb-2">report</span>
            <span class="font-label-caps text-label-caps text-on-surface-variant uppercase">Total Laporan</span>
            <span class="font-headline-lg text-headline-lg text-on-surface mt-1">8</span>
        </div>
    </div>
    <!-- Complex Layout Area -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-gutter mt-8">
        <!-- Main Column: Users & Table -->
        <div class="lg:col-span-2 space-y-gutter">
            <!-- Manajemen Pengguna Widget -->
            <div
                class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm border-t-4 border-t-primary">
                <div class="flex justify-between items-center mb-6">
                    <h3 class="font-headline-md text-headline-md text-on-surface">Manajemen Pengguna</h3>
                    <a href="{{ route('super_admin.warga.create') }}"
                        class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm flex items-center gap-2 hover:bg-primary/90 transition-colors w-fit">
                        <span class="material-symbols-outlined text-sm">add</span> Tambah Warga
                    </a>
                </div>
                <div class="flex gap-4">
                    <div
                        class="flex-1 bg-surface-container p-4 rounded-lg flex items-center gap-3 border border-outline-variant/30 hover:border-primary/50 cursor-pointer transition-colors"
                        onclick="window.location.href='{{ route('super_admin.warga') }}'">
                        <div class="bg-primary-container text-on-primary-container p-2 rounded-full flex">
                            <span class="material-symbols-outlined">edit_document</span>
                        </div>
                        <div>
                            <h4 class="font-body-lg font-semibold text-on-surface">Data Warga</h4>
                            <p class="font-body-sm text-on-surface-variant">Kelola data dan akun warga.</p>
                        </div>
                    </div>
                    <div
                        class="flex-1 bg-surface-container p-4 rounded-lg flex items-center gap-3 border border-outline-variant/30 hover:border-primary/50 cursor-pointer transition-colors"
                        onclick="window.location.href='{{ route('super_admin.warga.pending') }}'">
                        <div class="bg-secondary-container text-on-secondary-container p-2 rounded-full flex">
                            <span class="material-symbols-outlined">how_to_reg</span>
                        </div>
                        <div>
                            <h4 class="font-body-lg font-semibold text-on-surface">Verifikasi Warga</h4>
                            <p class="font-body-sm text-on-surface-variant">Akun pending menunggu aktivasi.</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Table Widget -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
                <div class="p-6 border-b border-outline-variant bg-surface">
                    <h3 class="font-headline-md text-headline-md text-on-surface">Daftar RT &amp; Status Kepengurusan</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr
                                class="border-b border-outline-variant bg-surface-container-low text-on-surface-variant font-label-caps text-label-caps">
                                <th class="p-4 font-semibold">Nama Wilayah</th>
                                <th class="p-4 font-semibold">Ketua RT</th>
                                <th class="p-4 font-semibold">Jumlah KK</th>
                                <th class="p-4 font-semibold">Status SK</th>
                                <th class="p-4 font-semibold">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="font-body-sm text-on-surface">
                            <tr
                                class="border-b border-outline-variant hover:bg-surface-container-lowest/50 transition-colors">
                                <td class="p-4 font-semibold text-on-surface">RT 01 / RW 05</td>
                                <td class="p-4">Budi Santoso</td>
                                <td class="p-4">45</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-secondary/10 text-secondary">Aktif</span>
                                </td>
                                <td class="p-4"><button class="text-primary hover:underline">Detail</button></td>
                            </tr>
                            <tr
                                class="border-b border-outline-variant hover:bg-surface-container-lowest/50 transition-colors">
                                <td class="p-4 font-semibold text-on-surface">RT 02 / RW 05</td>
                                <td class="p-4">Agus Wijaya</td>
                                <td class="p-4">38</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-secondary/10 text-secondary">Aktif</span>
                                </td>
                                <td class="p-4"><button class="text-primary hover:underline">Detail</button></td>
                            </tr>
                            <tr class="hover:bg-surface-container-lowest/50 transition-colors">
                                <td class="p-4 font-semibold text-on-surface">RT 03 / RW 05</td>
                                <td class="p-4">Siti Aminah</td>
                                <td class="p-4">52</td>
                                <td class="p-4">
                                    <span
                                        class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold bg-error/10 text-error">Kadaluarsa</span>
                                </td>
                                <td class="p-4"><button class="text-primary hover:underline">Detail</button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- Side Column: Activity & Announcements -->
        <div class="space-y-gutter">
            <!-- Pengumuman Global -->
            <div class="bg-primary/5 border border-primary/20 rounded-xl p-6 shadow-sm relative overflow-hidden">
                <div
                    class="absolute top-0 right-0 w-32 h-32 bg-primary/10 rounded-full -translate-y-10 translate-x-10 blur-2xl">
                </div>
                <h3 class="font-headline-md text-headline-md text-on-surface mb-4 flex items-center gap-2">
                    <span class="material-symbols-outlined text-primary">campaign</span> Pengumuman
                </h3>
                <div class="space-y-4 relative z-10">
                    <div class="bg-surface-container-lowest p-3 rounded-lg border border-outline-variant/50">
                        <span class="font-label-caps text-label-caps text-error mb-1 block">Penting</span>
                        <p class="font-body-sm text-on-surface font-medium">Jadwal Kerja Bakti Bulanan RW 05 dialihkan ke
                            tanggal 20.</p>
                    </div>
                    <div class="bg-surface-container-lowest p-3 rounded-lg border border-outline-variant/50">
                        <span class="font-label-caps text-label-caps text-primary mb-1 block">Info</span>
                        <p class="font-body-sm text-on-surface font-medium">Pembaruan sistem iuran selesai dilakukan.</p>
                    </div>
                    <button
                        class="w-full py-2 text-center text-primary font-body-sm font-semibold hover:bg-primary/5 rounded-lg transition-colors">Buat
                        Pengumuman</button>
                </div>
            </div>
            <!-- Log Aktivitas -->
            <div class="bg-surface-container-lowest border border-outline-variant rounded-xl p-6 shadow-sm">
                <h3 class="font-headline-md text-headline-md text-on-surface mb-4">Log Aktivitas</h3>
                <div
                    class="space-y-4 relative before:absolute before:inset-0 before:ml-2 before:-translate-x-px md:before:mx-auto md:before:translate-x-0 before:h-full before:w-0.5 before:bg-gradient-to-b before:from-transparent before:via-outline-variant before:to-transparent pl-6">
                    <div class="relative">
                        <div
                            class="absolute -left-7 top-1 w-2.5 h-2.5 bg-primary rounded-full ring-4 ring-surface-container-lowest">
                        </div>
                        <p class="font-body-sm text-on-surface"><span class="font-semibold">Budi (RT 01)</span> menyetujui
                            laporan warga.</p>
                        <span class="text-xs text-on-surface-variant">10 mnt lalu</span>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute -left-7 top-1 w-2.5 h-2.5 bg-outline rounded-full ring-4 ring-surface-container-lowest">
                        </div>
                        <p class="font-body-sm text-on-surface">Sistem mencatat pemasukan iuran otomatis.</p>
                        <span class="text-xs text-on-surface-variant">1 jam lalu</span>
                    </div>
                    <div class="relative">
                        <div
                            class="absolute -left-7 top-1 w-2.5 h-2.5 bg-secondary rounded-full ring-4 ring-surface-container-lowest">
                        </div>
                        <p class="font-body-sm text-on-surface"><span class="font-semibold">Admin Pusat</span> mengubah role
                            user X.</p>
                        <span class="text-xs text-on-surface-variant">Kemarin, 14:20</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection