<x-app-layout>
    <div class="py-3 min-w-80">
        <div class="min-w-full mx-auto">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold text-2xl">
                    {{ __('Daftar Produk') }}
                </div>
            </div>
        </div>
    </div>
    <div class="mx-3 px-4 py-5 w-max-screen flex justify-end rounded">
        <button class="bg-redprimary text-white  rounded p-2 flex justify-center items-center text-sm"
            onClick="window.location.href=('{{ route('add.produk') }}')">
            <img src="{{ asset('images/PlusCircle.png') }}" alt="PlusCircle" width="15" class="m-1">
            Tambah Produk
        </button>
    </div>
    <div class="mx-3 px-4 py-5 w-max-screen bg-white rounded">

        <table class="display" style="width:100%" id="tableProduk">
            <thead>
                <tr>
                    <th class="px-6 py-2 text-xs text-gray-500">No</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Photo</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Name</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Kategori</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Harga Beli</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Harga Jual</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Stok</th>
                    <th class="px-6 py-2 text-xs text-gray-500">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <script>
        function hapus(id) {
            var dataId = $(id).data("id");

            var konfirmasi = confirm('Yakin Menghapus Data ini?');

            if (konfirmasi) {
                $.ajax({
                    type: 'GET',
                    // url: '/dokter/destroy/' + dataId,
                    url: '/deleteProduk/' + dataId,
                    data: {
                        id: dataId
                    },
                    dataType: 'json',
                    success: function(response) {
                        alert('Berhasil: ' + response.message);
                        $('#tableProduk').DataTable().ajax.reload();
                    },
                    error: function(xhr, status, error) {
                        if (xhr.status === 422) {
                            alert('Gagal: ' + xhr.responseJSON.message);
                        } else {
                            alert('Gagal: Terjadi kesalahan - ' + xhr.status + ' - ' + error);
                        }
                        $('#DTFetch').DataTable().ajax.reload();
                    }
                });
            } else {
                alert('Hapus Dibatalkan');
            }
        }

        $(function() {
            $('#tableProduk').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: false,
                searching: true,
                ajax: {
                    url: "{{ route('list.produk') }}",
                },
                dom: 'lBfrtip', // Add the Buttons extension to the DataTable
                buttons: [{
                        extend: 'excelHtml5',
                        className: 'bg-green-500 hover:bg-green-600 text-white font-bold py-2 px-4 ml-2 rounded '
                    },
                    {
                        extend: 'csvHtml5',
                        className: 'bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded'
                    },
                    {
                        extend: 'pdfHtml5',
                        className: 'bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded'
                    },
                ],
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'foto',
                        name: 'foto'
                    },
                    {
                        data: 'produk_name',
                        name: 'produk_name'
                    },
                    {
                        data: 'kategori_name',
                        name: 'kategori_name'
                    },
                    {
                        data: 'harga_beli',
                        name: 'harga_beli'
                    },
                    {
                        data: 'harga_jual',
                        name: 'harga_jual'
                    },
                    {
                        data: 'stok',
                        name: 'stok'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false
                    }
                ]
            });
        });
    </script>
</x-app-layout>
