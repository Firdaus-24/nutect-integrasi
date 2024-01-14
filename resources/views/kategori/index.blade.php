<x-app-layout>
    <div class="py-3 min-w-80">
        <div class="min-w-full mx-auto">
            <div class="dark:bg-gray-800 overflow-hidden sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 font-semibold text-2xl">
                    {{ __('Daftar Kategori') }}
                </div>
            </div>
        </div>
    </div>

    <!-- Alert Error -->
    @error('txtnama')
        <div class="bg-red-100 mx-3 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">{{ $message }}</strong>
        </div>
    @enderror

    <!-- Alert Success -->
    @if (session('success'))
        <div class="bg-blue-100 mx-3 border border-blue-400 text-blue-700 px-4 py-3 rounded relative mb-4" role="alert">
            <strong class="font-bold">Horee</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    @endif

    {{-- <div class="px-4 py-5 mx-3 max-w-screen bg-white rounded">
        <label class="text-lg">Form input kategori</label>
        <form action="{{ route('add.kategori') }}" method="post">
            @csrf
            <div class="flex flex-row w-full mx-auto">
                <input type="text" name="txtnama" id="txtnama" required autocomplete="off"
                    class="w-5/6 px-4 py-2 border rounded-md focus:outline-none focus:border-blue-500">
                <button type="submit" class="w-24 bg-red-500 rounded text-white ml-2">Tambah</button>
            </div>
        </form>
    </div> --}}

    <div class="mt-3 mx-3 px-4 py-5 w-max-screen bg-white rounded">
        <table class="table-auto w-full border border-slate-400" id="tableKategori">
            <thead>
                <tr>
                    <th class="border border-slate-300">No</th>
                    <th class="border border-slate-300">Name</th>
                    <th class="border border-slate-300">Create at</th>
                    <th class="border border-slate-300">Update at</th>
                    <th class="border border-slate-300">Aksi</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>
</x-app-layout>
@push('js')
    <script type="text/javascript">
        $(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },

            })
            $('#tableKategori').DataTable({
                processing: true,
                serverSide: true,
                paging: true,
                responsive: false,
                searching: true,
                ajax: {
                    url: "{{ route('list.kategori') }}",
                },
                columns: [{
                        data: 'no',
                        name: 'no',
                        orderable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
                    },
                    {
                        data: 'created_at',
                        name: 'created_at'
                    },
                    {
                        data: 'updated_at',
                        name: 'updated_at'
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        orderable: false
                    }
                ]
            });
        });
        console.log('Before DataTable initialization');
    </script>
@endpush
