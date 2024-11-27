<x-guest-layout>
    <div class="z-10 flex flex-col items-center justify-center space-y-2 gap-x-6">
        <img src="https://cdn-icons-png.flaticon.com/128/900/900618.png" alt="Logo" class="sm:ml-10">
        <div class="px-10 pt-5 pb-10 mx-1 rounded-md gap-x-5">
            <h2 class="py-6 text-5xl text-left text-gray-800 dark:text-white sm:ml--10 fade-in-left ">Computer Parts Inventory Management System</h2>
            <h3 class="text-justify text-gray-800 dark:text-white sm:ml-30 fade-in-left animation-delay-200">Lorem ipsum odor amet, consectetuer adipiscing elit. Condimentum vel ad interdum id cursus. Ante consectetur malesuada suscipit curabitur himenaeos massa velit ligula. Lacus sollicitudin senectus eleifend erat mauris; vehicula montes. Justo lobortis augue, eleifend elementum felis duis lorem morbi. Quam morbi maximus tempus aenean ullamcorper tellus libero. Cursus semper malesuada natoque magna cursus imperdiet vitae. Accumsan sagittis arcu natoque ante et eleifend.</h3>
        </div>
        @if (Route::has('login'))
            <nav class="flex justify-end flex-1 -mx-3 space-x-20">
                @auth
                    <a
                        href="{{ url('/dashboard') }}"
                        class="rounded-md px-3 py-2 bg-orange-600 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Dashboard
                    </a>
                @else
                    <a
                        href="{{ route('login') }}"
                        class="rounded-md px-10 py-2 space-y-4 bg-orange-500 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                    >
                        Log in
                    </a>

                    @if (Route::has('register'))
                        <a
                            href="{{ route('register') }}"
                            class="rounded-md px-10 py-2 bg-orange-500 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20] dark:text-white dark:hover:text-white/80 dark:focus-visible:ring-white"
                        >
                            Register
                        </a>
                    @endif
                @endauth
            </nav>
            @endif
    </div>
    
</x-guest-layout>