<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Tambah Lemari
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    Masukan data lemari baru
                </h4>
                <div class="overflow-x-auto px-6 py-6">
                    <form action="" method="post">
                        <div class="mt-4">
                            <x-input-label for="nama_lemari" :value="__('Nama Lemari')" />
                            <x-text-input id="nama_lemari" class="block mt-1 w-full" type="text" name="nama_lemari" :value="old('nama_lemari')" required />
                            <x-input-error :messages="$errors->get('nama_lemari')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi')" required />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <button class="bg-red-600 hover:bg-red-800 text-white px-6 py-2">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>