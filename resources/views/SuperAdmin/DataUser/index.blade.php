@extends('layouts.superadmin')

@section('title', 'Sistem Manajemen Warga - Data User')

@section('content')
    <!-- Welcome -->
    <div class="mb-8 flex flex-col md:flex-row md:items-end md:justify-between gap-4">
        <div>
            <h2 class="font-headline-lg-mobile md:font-headline-lg text-headline-lg-mobile md:text-headline-lg text-on-surface">
                Data User</h2>
            <p class="font-body-lg text-body-lg text-on-surface-variant mt-2">Kelola akun pengguna, role, dan akses sistem.
            </p>
        </div>
        <button data-modal-open="modal-create"
            class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm flex items-center gap-2 hover:bg-primary/90 transition-colors w-fit">
            <span class="material-symbols-outlined text-sm">add</span> Tambah User
        </button>
    </div>

    <!-- Flash Messages -->
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

    <!-- Table Widget -->
    <div class="bg-surface-container-lowest border border-outline-variant rounded-xl overflow-hidden shadow-sm">
        <div class="p-6 border-b border-outline-variant bg-surface flex flex-col md:flex-row md:items-center gap-4">
            <h3 class="font-headline-md text-headline-md text-on-surface">Daftar Akun Pengguna</h3>
            <form action="{{ route('super_admin.user') }}" method="GET" class="md:ml-auto flex items-center gap-2">
                <div class="relative">
                    <span class="material-symbols-outlined absolute left-3 top-1/2 -translate-y-1/2 text-on-surface-variant text-base">search</span>
                    <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari username atau role..."
                        class="w-full md:w-64 bg-surface-container-low border border-outline-variant rounded-lg pl-10 pr-4 py-2 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <button type="submit"
                    class="bg-surface-container-high text-on-surface px-4 py-2 rounded-lg font-body-sm hover:bg-surface-container-highest transition-colors">Cari</button>
            </form>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="border-b border-outline-variant bg-surface-container-low text-on-surface-variant font-label-caps text-label-caps">
                        <th class="p-4 font-semibold">UserID</th>
                        <th class="p-4 font-semibold">Username</th>
                        <th class="p-4 font-semibold">Nama Lengkap</th>
                        <th class="p-4 font-semibold">Foto</th>
                        <th class="p-4 font-semibold">Token</th>
                        <th class="p-4 font-semibold">Role</th>
                        <th class="p-4 font-semibold">Aksi</th>
                    </tr>
                </thead>
                <tbody class="font-body-sm text-on-surface">
                    @forelse ($users as $user)
                        <tr class="border-b border-outline-variant hover:bg-surface-container-low/50 transition-colors">
                            <td class="p-4 text-on-surface-variant">#{{ $user->UserID }}</td>
                            <td class="p-4 font-semibold text-on-surface">{{ $user->Username }}</td>
                            <td class="p-4 text-on-surface">{{ $user->NamaLengkap ?? '-' }}</td>
                            <td class="p-4">
                                @if ($user->Foto)
                                    <img src="{{ asset('storage/' . $user->Foto) }}" alt="Foto" class="w-10 h-10 rounded-full object-cover">
                                @else
                                    <span class="text-on-surface-variant">-</span>
                                @endif
                            </td>
                            <td class="p-4 text-on-surface-variant font-mono text-xs">{{ $user->Token ?? '-' }}</td>
                            <td class="p-4">
                                <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-semibold {{ match ($user->Role) {
                                    'Super Admin' => 'bg-primary/10 text-primary',
                                    'RT' => 'bg-secondary/10 text-secondary',
                                    'Bendahara' => 'bg-tertiary/10 text-tertiary',
                                    'Ketua Pemuda' => 'bg-primary-fixed-dim/40 text-on-primary-fixed-variant',
                                    default => 'bg-surface-container-high text-on-surface-variant',
                                } }}">{{ $user->Role }}</span>
                            </td>
                            <td class="p-4">
                                <div class="flex items-center gap-2">
                                    <button data-modal-open="modal-edit" data-id="{{ $user->UserID }}"
                                        data-username="{{ $user->Username }}" data-role="{{ $user->Role }}"
                                        data-nama="{{ $user->NamaLengkap ?? '' }}" data-foto="{{ $user->Foto ?? '' }}"
                                        data-token="{{ $user->Token ?? '' }}"
                                        class="text-primary hover:bg-primary/10 p-2 rounded-full transition-colors" title="Edit">
                                        <span class="material-symbols-outlined text-base">edit</span>
                                    </button>
                                    <button data-modal-open="modal-delete" data-id="{{ $user->UserID }}"
                                        data-username="{{ $user->Username }}"
                                        class="text-error hover:bg-error/10 p-2 rounded-full transition-colors" title="Hapus">
                                        <span class="material-symbols-outlined text-base">delete</span>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-10 text-center text-on-surface-variant">
                                <span class="material-symbols-outlined text-3xl mb-2 block">person_off</span>
                                Tidak ada data user ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if ($users->hasPages())
            <div class="p-4 border-t border-outline-variant">
                {{ $users->links() }}
            </div>
        @endif
    </div>

    <!-- Modal Create -->
    <div id="modal-create" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" data-modal-close></div>
        <div class="relative bg-surface-container-lowest rounded-xl w-full max-w-md shadow-xl">
            <div class="flex items-center justify-between p-6 pb-4 border-b border-outline-variant">
                <h3 class="font-headline-md text-headline-md text-on-surface">Tambah User</h3>
                <button data-modal-close class="text-on-surface-variant hover:bg-surface-container-high p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form action="{{ route('super_admin.user.store') }}" method="POST" class="p-6 space-y-4">
                @csrf
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Username</label>
                    <input type="text" name="Username" required maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Password</label>
                    <input type="password" name="Password" required minlength="6"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Nama Lengkap</label>
                    <input type="text" name="NamaLengkap" required maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Foto</label>
                    <input type="text" name="Foto" maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Token</label>
                    <input type="text" name="Token" maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Role</label>
                    <select name="Role" required
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" data-modal-close
                        class="px-4 py-2 rounded-lg font-body-sm text-on-surface-variant hover:bg-surface-container-high transition-colors">Batal</button>
                    <button type="submit"
                        class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm hover:bg-primary/90 transition-colors">Simpan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Edit -->
    <div id="modal-edit" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" data-modal-close></div>
        <div class="relative bg-surface-container-lowest rounded-xl w-full max-w-md shadow-xl">
            <div class="flex items-center justify-between p-6 pb-4 border-b border-outline-variant">
                <h3 class="font-headline-md text-headline-md text-on-surface">Edit User</h3>
                <button data-modal-close class="text-on-surface-variant hover:bg-surface-container-high p-2 rounded-full transition-colors">
                    <span class="material-symbols-outlined">close</span>
                </button>
            </div>
            <form id="form-edit" action="#" method="POST" class="p-6 space-y-4">
                @csrf
                @method('PUT')
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Username</label>
                    <input type="text" id="edit-username" name="Username" required maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Password <span class="text-on-surface-variant font-normal">(kosongkan jika tidak diganti)</span></label>
                    <input type="password" name="Password" minlength="6"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Nama Lengkap</label>
                    <input type="text" id="edit-nama" name="NamaLengkap" required maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Foto</label>
                    <input type="text" id="edit-foto" name="Foto" maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Token</label>
                    <input type="text" id="edit-token" name="Token" maxlength="255"
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                </div>
                <div>
                    <label class="font-body-sm font-semibold text-on-surface mb-1 block">Role</label>
                    <select id="edit-role" name="Role" required
                        class="w-full bg-surface-container-low border border-outline-variant rounded-lg px-4 py-2.5 font-body-sm focus:outline-none focus:ring-2 focus:ring-primary">
                        @foreach ($roles as $role)
                            <option value="{{ $role }}">{{ $role }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" data-modal-close
                        class="px-4 py-2 rounded-lg font-body-sm text-on-surface-variant hover:bg-surface-container-high transition-colors">Batal</button>
                    <button type="submit"
                        class="bg-primary text-on-primary px-4 py-2 rounded-lg font-body-sm hover:bg-primary/90 transition-colors">Simpan Perubahan</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Modal Delete -->
    <div id="modal-delete" class="fixed inset-0 z-50 hidden items-center justify-center p-4">
        <div class="absolute inset-0 bg-black/40" data-modal-close></div>
        <div class="relative bg-surface-container-lowest rounded-xl w-full max-w-sm shadow-xl">
            <div class="p-6 pb-4">
                <span class="material-symbols-outlined text-error text-4xl block mb-3">warning</span>
                <h3 class="font-headline-md text-headline-md text-on-surface mb-1">Hapus User</h3>
                <p class="font-body-sm text-on-surface-variant">Yakin ingin menghapus user <span id="delete-username" class="font-semibold text-on-surface"></span>? Tindakan ini tidak dapat dibatalkan.</p>
            </div>
            <form id="form-delete" action="#" method="POST" class="flex justify-end gap-2 p-6 pt-2">
                @csrf
                @method('DELETE')
                <button type="button" data-modal-close
                    class="px-4 py-2 rounded-lg font-body-sm text-on-surface-variant hover:bg-surface-container-high transition-colors">Batal</button>
                <button type="submit"
                    class="bg-error text-on-error px-4 py-2 rounded-lg font-body-sm hover:bg-error/90 transition-colors">Hapus</button>
            </form>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        function openModal(id) {
            const modal = document.getElementById(id);
            if (!modal) return;
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(modal) {
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.querySelectorAll('[data-modal-close]').forEach((el) => {
            el.addEventListener('click', () => closeModal(el.closest('.fixed')));
        });

        document.querySelectorAll('[data-modal-open="modal-create"]').forEach((el) => {
            el.addEventListener('click', () => openModal('modal-create'));
        });

        document.querySelectorAll('[data-modal-open="modal-edit"]').forEach((el) => {
            el.addEventListener('click', () => {
                const form = document.getElementById('form-edit');
                form.action = "{{ route('super_admin.user.update', ['user' => '__ID__']) }}"
                    .replace('__ID__', el.dataset.id);
                document.getElementById('edit-username').value = el.dataset.username;
                document.getElementById('edit-role').value = el.dataset.role;
                document.getElementById('edit-nama').value = el.dataset.nama ?? '';
                document.getElementById('edit-foto').value = el.dataset.foto ?? '';
                document.getElementById('edit-token').value = el.dataset.token ?? '';
                form.querySelector('input[name="Password"]').value = '';
                openModal('modal-edit');
            });
        });

        document.querySelectorAll('[data-modal-open="modal-delete"]').forEach((el) => {
            el.addEventListener('click', () => {
                const form = document.getElementById('form-delete');
                form.action = "{{ route('super_admin.user.destroy', ['user' => '__ID__']) }}"
                    .replace('__ID__', el.dataset.id);
                document.getElementById('delete-username').textContent = el.dataset.username;
                openModal('modal-delete');
            });
        });

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') {
                document.querySelectorAll('.fixed:not(.hidden)').forEach(closeModal);
            }
        });
    </script>
@endpush
