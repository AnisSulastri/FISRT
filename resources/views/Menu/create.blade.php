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
                    <form method="POST" action="{{ route('menu.store') }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf

                        <div class="max-w-xl">
                            <x-input-label for="image" value="Gambar Menu" />
                            <x-file-input id="image" name="image" class="mt-1 block w-full" />
                            <x-input-error class="mt-2" :messages="$errors->get('image')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="title" value="Judul Menu" />
                            <x-text-input id="title" type="text" name="title" class="mt-1 block w-full"
                                value="{{ old('title') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div class="max-w-xl">
                            <x-input-label for="description" value="Deskripsi Menu" />
                            <textarea id="description" name="description"
                                class="mt-1 block w-full rounded-md shadow-sm border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-white"
                                rows="5">{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 max-w-xl">
                            <div>
                                <x-input-label for="price" value="Harga" />
                                <x-text-input id="price" type="number" name="price" class="mt-1 block w-full"
                                    value="{{ old('price') }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('price')" />
                            </div>

                            <div>
                                <x-input-label for="stock" value="Stok" />
                                <x-text-input id="stock" type="number" name="stock" class="mt-1 block w-full"
                                    value="{{ old('stock') }}" required />
                                <x-input-error class="mt-2" :messages="$errors->get('stock')" />
                            </div>
                        </div>

                        <div class="flex space-x-4 mt-6">
                           <x-secondary-button tag="a" href="{{ route('menu') }}">Batal</x-secondary-button>
                            <x-primary-button type="submit">Simpan</x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
