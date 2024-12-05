<nav x-data="{ openProfile: false, openDatabase: false, openServices: false }" class="fixed z-30 w-64 h-screen text-white bg-gradient-to-t from-orange-500 to-amber-400 drop-shadow-lg">
    <!-- Sidebar Logo -->
    <div class="px-6 py-4">
        <img src="https://cdn-icons-png.flaticon.com/128/18434/18434254.png" alt="Logo" class="py-5 sm:ml-1">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
            <x-application-logo class="w-10 h-10 text-gray-200 fill-current" />
            <span class="text-xl font-semibold">INVendory an Inventory Management System</span>
        </a>
    </div>

    <!-- Sidebar Navigation Links -->
    <div class="mt-6 space-y-2">
        <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')" class="block px-4 py-2 rounded-md hover:bg-green-500">
            <span class="flex items-center text-base">
                <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" />
                </svg>
                {{ __('Dashboard') }}
            </span>
        </x-nav-link>

            <!-- users navlink here-->

        <!-- Computer Parts Section -->
        <div>
            <button @click="openDatabase = !openDatabase" class="flex items-center justify-between w-full px-4 py-2 rounded-md hover:bg-green-500">
                <span>Item Database</span>
                <svg :class="{ 'rotate-180': openDatabase }" class="w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openDatabase" class="pl-6 mt-2 space-y-2">
                <x-nav-link :href="route('items.index')" class="block px-4 py-2 hover:bg-green-500">{{ __('List of Items') }}</x-nav-link>
            </div>
            {{-- <div x-show="openDatabase" class="pl-6 mt-2 space-y-2">
                <x-nav-link :href="route('items.create')" class="block px-4 py-2 hover:bg-green-500">{{ __('Add Item') }}</x-nav-link>
            </div> --}}
        </div>

        <!-- Services Section -->
        {{-- <div>
            <button @click="openServices = !openServices" class="flex items-center justify-between w-full px-4 py-2 rounded-md hover:bg-green-500">
                <span>Services</span>
                <svg :class="{ 'rotate-180': openServices }" class="w-4 h-4 transition-transform" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
            </button>
            <div x-show="openServices" class="pl-6 mt-2 space-y-2">
            </div>
        </div> --}}
    </div>

<!-- Footer -->
<div class="absolute bottom-0 w-full px-3 py-4 bg-neutral-800">
    <div class="user-info">
        <img src="https://cdn-icons-png.flaticon.com/128/1144/1144709.png" alt="User Avatar" class="w-10 h-10">
        <div class="user-details">
            <p class="text-sm font-semibold username">{{ Auth::user()->name }}</p>
            <p class="text-xs email">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="icon-container">
        <x-nav-link :href="route('profile.edit')" class="w-8 h-8 gear-icon ">
            <img src="https://cdn-icons-png.flaticon.com/128/484/484562.png" alt="Gear Icon">
            <p class="opacity">Edit Profile</p>
        </x-nav-link>
        <form method="POST" action="{{ route('logout') }}" class="logout-icon"> 
            @csrf 
            <x-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="w-8 h-8 "> 
                <img src="https://cdn-icons-png.flaticon.com/128/18238/18238318.png" alt="Logout Icon">
                <p class="opacity">Logout</p>
            </x-nav-link> 
        </form>
    </div>
</div>


</nav>
