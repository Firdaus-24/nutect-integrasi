<x-app-layout>
    <div class="px-6 py-6 inline-block w-64">
        <img src="{{ asset('images/Frame 98700.png') }}" alt="">
    </div>

    <div class="w-screen">
        <div class="font-bold mx-6 ">
            <h3 class="text-2xl">Muhamad Firdaus</h3>
        </div>
    </div>

    <div class=" mx-6 my-3 grid  grid-cols-4">
        <div class="col-span-3 flex flex-col mr-3">
            <label for="nama" class="font-semibold">Nama Kandidat</label>
            <div class="relative">
                <span class="min-w-24 absolute inset-y-0 left-0 pl-2 ml-3 flex items-center  text-gray-700">
                    @
                </span>
                <input type="text" value="Muhammad firdaus"
                    class="bg-transparent text-right border border-gray-300 text-gray-700 px-4 py-2 rounded-md focus:outline-none focus:border-blue-500 w-full">
            </div>
        </div>
        <div class="col-span-1 flex flex-col">
            <label for="nama" class="font-semibold">Posisi Kandidat</label>
            <div class="relative">
                <span
                    class="material-symbols-outlined min-w-24 absolute inset-y-0 left-0 pl-2 ml-3 flex items-center  text-gray-700">
                    code_off
                </span>
                <input type="text" value="website programer"
                    class="bg-transparent text-right ps-8 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 w-full">

            </div>
        </div>
    </div>
</x-app-layout>
