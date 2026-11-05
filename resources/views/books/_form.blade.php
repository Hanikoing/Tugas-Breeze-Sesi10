<div class="space-y-4">

    <div>
        <label class="block font-medium mb-1">Judul Buku</label>
        <input type="text" name="judul"
               value="{{ old('judul', $book->judul ?? '') }}"
               class="w-full border-gray-300 rounded-lg" required>
        @error('judul')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Penulis</label>
        <input type="text" name="penulis"
               value="{{ old('penulis', $book->penulis ?? '') }}"
               class="w-full border-gray-300 rounded-lg" required>
        @error('penulis')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Penerbit</label>
        <input type="text" name="penerbit"
               value="{{ old('penerbit', $book->penerbit ?? '') }}"
               class="w-full border-gray-300 rounded-lg" required>
        @error('penerbit')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Tahun Terbit</label>
        <input type="number" name="tahun_terbit"
               value="{{ old('tahun_terbit', $book->tahun_terbit ?? '') }}"
               min="1000" max="9999"
               class="w-full border-gray-300 rounded-lg" required>
        @error('tahun_terbit')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">ISBN</label>
        <input type="text" name="isbn"
               value="{{ old('isbn', $book->isbn ?? '') }}"
               class="w-full border-gray-300 rounded-lg">
        @error('isbn')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label class="block font-medium mb-1">Stok Buku</label>
        <input type="number" name="stok"
               value="{{ old('stok', $book->stok ?? 0) }}"
               min="0"
               class="w-full border-gray-300 rounded-lg" required>
        @error('stok')
            <p class="text-red-600 text-sm">{{ $message }}</p>
        @enderror
    </div>

</div>
