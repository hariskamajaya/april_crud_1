<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Tambah Buku
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="p-6 text-gray-900 dark:text-gray-100">
                    Masukan data buku baru
                </h4>
                <div class="overflow-x-auto p-6">
                    <form action="{{route('buku.post')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mt-4">
                            <x-input-label for="judul_buku" :value="__('Judul Buku')" />
                            <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku" :value="old('judul_buku')" required />
                            <x-input-error :messages="$errors->get('judul_buku')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="id_lemari" :value="__('Lemari')" />
                            {{-- <x-text-input id="judul_buku" class="block mt-1 w-full" type="text" name="judul_buku" :value="old('judul_buku')" required /> --}}
                            <select name="id_lemari" id="id_lemari" class="block mt-1 w-full border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm" required>
                                <option value=""> -Pilih Lemari- </option>
                                @foreach ($lemari as $item)
                                    <option value="{{$item->id}}">{{$item->nama_lemari}}</option>
                                @endforeach
                            </select>
                            <x-input-error :messages="$errors->get('id_lemari')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="penulis" :value="__('Penulis')" />
                            <x-text-input id="penulis" class="block mt-1 w-full" type="text" name="penulis" :value="old('penulis')" required />
                            <x-input-error :messages="$errors->get('penulis')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="penerbit" :value="__('Penerbit')" />
                            <x-text-input id="penerbit" class="block mt-1 w-full" type="text" name="penerbit" :value="old('penerbit')" required />
                            <x-input-error :messages="$errors->get('penerbit')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="cover" :value="__('Cover')" />
                            <x-text-input id="cover" class="block mt-1 w-full" type="file" name="cover" :value="old('cover')" required />
                            <x-input-error :messages="$errors->get('cover')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi Buku')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi" :value="old('deskripsi')" required />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>

                        <div class="mt-4">
                            <button class="bg-red-600 hover:bg-red-800 text-white px-6 py-2 rounded-md">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>