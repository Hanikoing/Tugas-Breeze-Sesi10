<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Detail Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <h3 class="text-2xl font-bold text-gray-800 mb-6">
                    {{ $book->judul }}
                </h3>

                <div class="space-y-4">

                    <div>
                        <p class="text-gray-500 text-sm">Penulis</p>
                        <p class="font-semibold">{{ $book->penulis }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Penerbit</p>
                        <p class="font-semibold">{{ $book->penerbit }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Tahun Terbit</p>
                        <p class="font-semibold">{{ $book->tahun_terbit }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">ISBN</p>
                        <p class="font-semibold">{{ $book->isbn ?? '-' }}</p>
                    </div>

                    <div>
                        <p class="text-gray-500 text-sm">Stok</p>
                        <p class="font-semibold">{{ $book->stok }}</p>
                    </div>

                </div>

                <div class="mt-8">
                    <a href="{{ route('books.index') }}"
                       class="bg-gray-600 text-white px-5 py-2 rounded-lg">
                        Kembali ke Daftar Buku
                    </a>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
