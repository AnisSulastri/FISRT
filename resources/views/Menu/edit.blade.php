<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Menu') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="POST" action="{{ route('menu.update', $menu->id) }}" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        @method('PATCH') 

                        {{-- Image --}}
                        <div>
                            <x-input-label for="image" value="Gambar" />
                            <x-file-input id="image" name="image" class="mt-1 block w-full" />
                            <x-input-error :messages="$errors->get('image')" class="mt-2" />
                            @if ($menu->image)
                                <img src="{{ asset('storage/public/public/menus/' . $menu->image) }}" alt="{{ $menu->title }}" class="w-32 mt-2 rounded">
                            @endif
                        </div>

                        {{-- Title --}}
                        <div>
                            <x-input-label for="title" value="Nama" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" value="{{ old('title', $menu->title) }}" required autofocus />
                            <x-input-error :messages="$errors->get('title')" class="mt-2" />
                        </div>

                        {{-- Description --}}
                        <div>
                            <x-input-label for="description" value="Deskripsi" />
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full rounded-md border-gray-300 focus:border-indigo-500 focus:ring-indigo-500">{{ old('description', $menu->description) }}</textarea>
                            <x-input-error :messages="$errors->get('description')" class="mt-2" />
                        </div>

                        {{-- Category --}}
                        <div>
                            <x-input-label for="category" value="Kategori" />
                            <x-text-input id="category" name="category" type="text" class="mt-1 block w-full" value="{{ old('category', $menu->category) }}" required />
                            <x-input-error :messages="$errors->get('category')" class="mt-2" />
                        </div>

                        {{-- Price --}}
                        <div>
                            <x-input-label for="price" value="Harga" />
                            <x-text-input id="price" name="price" type="number" step="0.01" class="mt-1 block w-full" value="{{ old('price', $menu->price) }}" required />
                            <x-input-error :messages="$errors->get('price')" class="mt-2" />
                        </div>

                        {{-- Stock --}}
                        <div>
                            <x-input-label for="stock" value="Stok" />
                            <x-text-input id="stock" name="stock" type="number" class="mt-1 block w-full" value="{{ old('stock', $menu->stock) }}" required />
                            <x-input-error :messages="$errors->get('stock')" class="mt-2" />
                        </div>

                        <div class="flex space-x-3">
                             <x-secondary-button tag="a" href="{{ route('menu') }}">Batal</x-secondary-button>
                            <x-primary-button>Update</x-primary-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
