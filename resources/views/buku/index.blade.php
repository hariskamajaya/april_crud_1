<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Buku
            </h2>

            <a href="{{route('buku.create')}}"
                class="bg-red-600 px-3 py-2 text-white rounded-md hover:bg-red-700">Tambah Buku</a>
        </div>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <h4 class="px-6 mt-4 text-gray-900 dark:text-gray-100">
                    Halaman Data Buku
                </h4>
                <div class="overflow-x-auto px-6 py-6">
                    <table class="min-w-full bg-slate-50 dark:bg-transparent">
                        <thead class="bg-gray-300 dark:bg-red-600 dark:text-white">
                            <th class="py-1 px-4 uppercase text-sm">Judul Buku</th>
                            <th class="py-1 px-4 uppercase text-sm">Penulis</th>
                            <th class="py-1 px-4 uppercase text-sm">Penerbit</th>
                            <th class="py-1 px-4 uppercase text-sm">Lemari</th>
                            <th class="py-1 px-4 uppercase text-sm">Action</th>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                                <tr>
                                    <td class="py-2 px-4 text-sm dark:text-white">{{$item->judul_buku}}</td>
                                    <td class="py-2 px-4 text-sm dark:text-white">{{$item->penulis}}</td>
                                    <td class="py-2 px-4 text-sm dark:text-white">{{$item->penerbit}}</td>
                                    <td class="py-2 px-4 text-sm dark:text-white">{{$item->lemari->nama_lemari}}</td>
                                    <td class="py-2 px-4 text-sm text-center ">

                                        <form action="{{route('buku.delete', $item->id)}}" method="post">
                                            @csrf
                                            @method('delete')
                                            <a href="{{route('buku.show', $item->id)}}"
                                                class="dark:text-red-600 px-6 py-2 font-semibold hover:bg-red-600 hover:text-white rounded-md">detail</a>
                                            <button type="submit" class="dark:text-red-600 px-6 py-2 font-semibold hover:bg-red-600 hover:text-white rounded-md"
                                            onclick="return confirm('Yakin data ini akan dihapus?')">hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{$data}}
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>