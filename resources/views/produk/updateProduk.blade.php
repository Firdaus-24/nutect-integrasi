<x-app-layout>
    <div class="py-3 min-w-80">
        <div class="min-w-full mx-auto">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold text-2xl">
                    {{ __('Daftar Produk > Update Produk') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Error -->
    @error('produk_name')
        <div class="bg-red-100 mx-3 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">{{ $message }}</strong>
        </div>
    @enderror
    @error('foto')
        <div class="bg-red-100 mx-3 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">{{ $message }}</strong>
        </div>
    @enderror

    <!-- Alert Success -->
    @if (session('success'))
        <div class="bg-blue-100 mx-3 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4"
            role="alert">
            <strong class="font-bold">Horee</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif
    <form action="{{ route('edit.produk') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" value="{{ $produk->id }}" name="id">
        <div class="mx-3 px-4 py-5 w-max-screen">
            <div class="grid grid-cols-3 gap-4">
                <div class="col-span-1">
                    <div class="flex flex-col ">
                        <label for="kategori_id" class="mb-2">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="rounded" required>
                            <option value="">Pilih</option>
                            @foreach ($data as $item)
                                <option value="{{ $item->id }}"
                                    {{ $produk->kategori_id == $item->id ? 'selected' : '' }}>
                                    {{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-span-2">
                    <div class="flex flex-col ">
                        <label for="produk_name" class="mb-2">Nama</label>
                        <input type="text" name="produk_name" id="produk_name" class="rounded"
                            placeholder="masukan nama" autocomplete="off" value="{{ $produk->produk_name }}" required>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col ">
                        <label for="harga_beli" class="mb-2">Harga Beli</label>
                        <input type="number" name="harga_beli" id="harga_beli" class="rounded"
                            onkeyup="return getHargajual(this.value)" placeholder="masukan harga beli"
                            value="{{ $produk->harga_beli }}" required>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col ">
                        <label for="harga_jual" class="mb-2">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="rounded"
                            placeholder="masukan harga jual" value="{{ $produk->harga_jual }}" readonly>
                    </div>
                </div>
                <div class="col-span-1">
                    <div class="flex flex-col ">
                        <label for="stok" class="mb-2">Stok</label>
                        <input type="number" name="stok" id="stok" class="rounded" placeholder="masukan stok"
                            value="{{ $produk->stok }}" required>
                    </div>
                </div>
                <div class="col-span-3">
                    <div class="flex flex-col ">
                        <label for="foto" class="mb-2">Upload Image</label>
                        <img src="{{ asset('images/' . $produk->foto) }}" alt="{{ $produk->foto }}"
                            class="max-w-20 mx-3 my-3">
                        <input type="file" name="foto" id="foto" class="rounded"
                            accept="image/png, image/jpeg">
                    </div>
                </div>
            </div>
        </div>
        <div class="flex w-full px-6 justify-end">
            <button class="border-solid border-2 border-indigo-600  px-10 py-2 rounded mx-2" type="button"
                onclick="window.location.href=('{{ route('show.produk') }}')">kembali</button>
            <button class="bg-indigo-600 text-white px-10 py-2 rounded mx-2" type="submit">simpan</button>
        </div>
    </form>

    <script>
        function getHargajual(e) {
            let harga = parseInt(e);
            let hargajual = harga + (harga * 0.3)

            $('#harga_jual').val(hargajual);
        }
    </script>
</x-app-layout>
