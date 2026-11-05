<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800">
            Edit Buku
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-6 shadow-sm sm:rounded-lg">

                <form action="{{ route('books.update', $book->id) }}"
                      method="POST">

                    @csrf
                    @method('PUT')

                    @include('books._form')

                    <div class="flex gap-3 mt-6">
                        <button type="submit"
                                class="bg-blue-600 text-white px-5 py-2 rounded-lg">
                            Update Buku
                        </button>

                        <a href="{{ route('books.index') }}"
                           class="bg-gray-500 text-white px-5 py-2 rounded-lg">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>
    </div>
</x-app-layout>
