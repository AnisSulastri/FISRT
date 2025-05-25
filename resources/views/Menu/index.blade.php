<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <!-- Tombol Tambah Menu -->
                    <a href="{{ route('menu.create') }}"
                       class="inline-block px-4 py-2 mb-4 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
                        Tambah Menu
                    </a>

                    <table class="min-w-full border-collapse border border-gray-300">
                        <thead>
                            <tr>
                                <th class="border border-gray-300 px-4 py-2">#</th>
                                <th class="border border-gray-300 px-4 py-2">Gambar</th>
                                <th class="border border-gray-300 px-4 py-2">Nama</th>
                                <th class="border border-gray-300 px-4 py-2">Harga</th>
                                <th class="border border-gray-300 px-4 py-2">Stok</th>
                                <th class="border border-gray-300 px-4 py-2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($menus as $menu)
                                <tr>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $loop->iteration }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">
                                        <img src="{{ asset('storage/menu/' . $menu->image) }}" alt="{{ $menu->title }}"
                                             class="w-24 mx-auto rounded">
                                    </td>
                                    <td class="border border-gray-300 px-4 py-2">{{ $menu->title }}</td>
                                    <td class="border border-gray-300 px-4 py-2">Rp {{ number_format($menu->price, 2, ',', '.') }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center">{{ $menu->stock }}</td>
                                    <td class="border border-gray-300 px-4 py-2 text-center space-x-2">

                                        <!-- Tombol Edit -->
                                        <a href="{{ route('menu.edit', $menu->id) }}"
                                           class="inline-block px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 transition">
                                            Edit
                                        </a>

                                        <!-- Tombol Delete -->
                                       <x-danger-button 
                                        x-data=""
                                        x-on:click.prevent="$dispatch('open-modal', 'confirm-menu-deletion')"
                                        x-on:click="$dispatch('set-action', '{{ route('menu.destroy', $menu->id) }}')">
                                        {{ __('Delete') }}
                                    </x-danger-button>

                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                    <!-- Modal konfirmasi hapus -->
                    <x-modal name="confirm-menu-deletion" focusable maxWidth="md" x-data="{ action: '' }" @set-action.window="action = $event.detail">
                        <form method="POST" :action="action" class="p-6">
                            @csrf
                            @method('DELETE')

                            <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                {{ __('Apakah Anda yakin ingin menghapus data menu ini?') }}
                            </h2>
                            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                                {{ __('Data yang sudah dihapus tidak dapat dikembalikan.') }}
                            </p>
                            <div class="mt-6 flex justify-end gap-3">
                                <x-secondary-button x-on:click="$dispatch('close')">
                                    {{ __('Batal') }}
                                </x-secondary-button>
                                <x-danger-button type="submit">
                                    {{ __('Hapus') }}
                                </x-danger-button>
                            </div>
                        </form>
                    </x-modal>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
