<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Detail Buku
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg mb-3">
                <h4 class="p-6 text-gray-900 dark:text-gray-100">
                    Detail {{$data->judul_buku}}
                </h4>
                <div class="overflow-x-auto px-6 py-6">
                    <table class="min-w-full bg-slate-50 dark:bg-transparent">
                        <tbody>
                            <tr>
                                <td class="py-2 text-sm dark:text-white">Judul buku</td>
                                <td class="py-2 text-sm dark:text-white">{{$data->judul_buku}}</td>
                                <td class="py-2 text-sm" rowspan="4">
                                    <img src="{{asset('storage/images/cover/'.$data->cover)}}" alt="cover buku" width="150">
                                </td>
                            </tr>
                            <tr>
                                <td class="py-2 text-sm dark:text-white">Penulis</td>
                                <td class="py-2 text-sm dark:text-white">{{$data->penulis}}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-sm dark:text-white">Penerbit</td>
                                <td class="py-2 text-sm dark:text-white">{{$data->penerbit}}</td>
                            </tr>
                            <tr>
                                <td class="py-2 text-sm dark:text-white">Deskripsi</td>
                                <td class="py-2 text-sm dark:text-white">{{$data->deskripsi}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="p-6  text-gray-900 dark:text-gray-100">
                    Ubah data {{$data->nama_lemari}}
                </h4>
                <div class="overflow-x-auto px-6 py-6">
                    <form action="{{route('lemari.update', $data->id)}}" method="post">
                        @csrf
                        @method('put')

                        <div class="mt-4">
                            <x-input-label for="nama_lemari" :value="__('Nama Lemari')" />
                            <x-text-input id="nama_lemari" class="block mt-1 w-full" type="text" name="nama_lemari"
                                :value="old('nama_lemari')" value="{{$data->nama_lemari}}" required />
                            <x-input-error :messages="$errors->get('nama_lemari')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <x-input-label for="deskripsi" :value="__('Deskripsi')" />
                            <x-text-input id="deskripsi" class="block mt-1 w-full" type="text" name="deskripsi"
                                :value="old('deskripsi')" value="{{$data->deskripsi}}" required />
                            <x-input-error :messages="$errors->get('deskripsi')" class="mt-2" />
                        </div>
                        <div class="mt-4">
                            <button class="bg-red-600 hover:bg-red-800 text-white px-6 py-2 rounded-md">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>