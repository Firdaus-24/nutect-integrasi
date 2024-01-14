<aside class="min-w-[16%] bg-redprimary ">
    <!-- Sidebar Content -->
    <div class="mb-10 flex justify-between items-center mt-6 p-6">
        <a href="{{ route('dashboard') }}" class="w-full items-center">
            <img src="{{ asset('images/Handbag.png') }}" alt="handbag" width="20" class="-mt-1 mr-2 inline-block">
            <h2 class="text-white text-lg font-semibold inline-block">SIMS Web App</h2>
        </a>
        <button type="button" class="p-0 mt-0 text-white">
            <span class="material-symbols-outlined " width="20">
                menu_open
            </span>
        </button>
        <!-- Tambahkan elemen-elemen sidebar sesuai kebutuhan -->
    </div>
    <div class="flex flex-col w-full">
        <ul class="leading-[3rem] text-white ">
            <li class="hover:bg-red-400 px-6">
                <a href="{{ route('show.kategori') }}" class="w-full flex">
                    <span class="material-symbols-outlined max-w-5 my-auto mr-3">
                        category
                    </span>
                    Kategori
                </a>
            </li>
            <li class="hover:bg-red-400 px-6">
                <a href="#" class="w-full flex">
                    <img src="{{ asset('images/Package.png') }}" alt="package" width="20"
                        class="max-w-15 my-auto mr-3">
                    Produk
                </a>
            </li>
            <li class="hover:bg-red-400 px-6">
                <a href="#" class="w-full flex">
                    <img src="{{ asset('images/user.png') }}" alt="user" width="20"
                        class="max-w-15 my-auto mr-3">
                    Profile
                </a>
            </li>
            <li class="hover:bg-red-400 px-6">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit" class="flex flex-row">
                        <img src="{{ asset('images/signout.png') }}" alt="signout" width="20"
                            class="max-w-15 my-auto mr-3">
                        Logout</button>
                </form>
            </li>

        </ul>
    </div>
</aside>
