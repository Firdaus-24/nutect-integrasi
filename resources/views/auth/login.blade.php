<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />



    <div class="w-1/2 mim-h-full font-sans flex flex-col justify-center items-center p-20">
        <div class="flex flex-row justify-center">
            <img src="{{ asset('images/Handbag.png') }}" alt="handbag"
                class="filter brightness-75 contrast-125 saturate-150  mr-3">
            <h3 class="text-2xl">Sims Web APP</h3>
        </div>
        <h3 class="font-bold text-4xl text-wrap text-center mt-6">Masukan atau buat akun untuk memulai</h3>
        <form method="POST" action="{{ route('login') }}" class="mt-6 w-full">
            @csrf
            <!-- Email Address -->
            <x-text-input id="email"
                class="text-md block px-3 py-2 rounded-lg w-full 
            bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
            focus:placeholder-gray-500
            focus:bg-white 
            focus:border-gray-600  
            focus:outline-none"
                type="email" name="email" :value="old('email')" placeholder="masukan email anda" required autofocus
                autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />

            <!-- Password -->
            <div class="py-2 mt-6" x-data="{ show: true }">
                <div class="relative">
                    <input placeholder="masukan password anda" :type="show ? 'password' : 'text'"
                        class="text-md block px-3 py-2 rounded-lg w-full 
                bg-white border-2 border-gray-300 placeholder-gray-600 shadow-md
                focus:placeholder-gray-500
                focus:bg-white 
                focus:border-gray-600  
                focus:outline-none"
                        name="password" id="password" required>
                    <div class="absolute inset-y-0 right-0 pr-3 flex items-center text-sm leading-5">

                        <svg class="h-4 text-gray-700" fill="none" @click="show = !show"
                            :class="{ 'hidden': !show, 'block': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 576 512">
                            <path fill="currentColor"
                                d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z">
                            </path>
                        </svg>

                        <svg class="h-6 text-gray-700" fill="none" @click="show = !show"
                            :class="{ 'block': !show, 'hidden': show }" xmlns="http://www.w3.org/2000/svg"
                            viewbox="0 0 640 512">
                            <path fill="currentColor"
                                d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z">
                            </path>
                        </svg>

                    </div>
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



            <div class="flex flex-col items-center justify-center mt-6">

                <button type="submit" class="bg-red-500 w-full text-white text-sm p-3 rounded-lg">Masuk</button>
                <div class="w-full flex justify-between">

                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mt-2"
                            href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800 mt-2">Register</a>
                    @endif
                </div>
            </div>
        </form>
    </div>
    <div class="w-1/2 p-0 m-0 mim-h-full bg-redprimary bg-center flex justify-end items-center overflow-hidden">
        <img src="{{ asset('images/frame.png') }}" alt="frame" width="550" height="600" class="p-0 m-0 ">
    </div>
</x-guest-layout>
