<nav x-data="{ open: false }" class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700">
   <!-- Primary Navigation Menu -->
   <div class=" mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between h-16">
         <div class="flex">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
               <a href="{{ route('home') }}">
                  <x-application-logo class="block h-9 w-auto fill-current text-gray-800 dark:text-gray-200" />
               </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
               @if (Auth::check() && Auth::user()->userrole == 'admin')
                  <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard Admin') }}</x-nav-link>
               @endif
               <x-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-nav-link>
               <x-nav-link :href="route('products.index')" :active="request()->routeIs(['products.index', 'products.show'])">Produk</x-nav-link>
               <x-nav-link :href="route('about.index')" :active="request()->routeIs('about.index')">Tentang Kami</x-nav-link>
               <x-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">Kontak</x-nav-link>
               @auth
                  <x-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">Keranjang</x-nav-link>
               @endauth
            </div>
         </div>


         <!-- Settings Dropdown -->
         <div class="hidden sm:flex sm:items-center sm:ms-6">

            <!-- Search Button -->
            <div class="ml-3 relative">
               <button @click="openSearch = !openSearch"
                  class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
                  <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                  </svg>
               </button>

               <!-- Search Input Field -->
               <div x-show="openSearch" @click.away="openSearch = false"
                  class="absolute right-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 divide-y divide-gray-100">
                  <div class="relative">
                     <input type="text" name="search" id="search"
                        class="w-full border-0 bg-transparent pl-4 pr-10 py-3 text-sm leading-5 text-gray-900 placeholder-gray-500 focus:outline-none focus:placeholder-gray-400 focus:ring-0"
                        placeholder="Search...">
                  </div>
               </div>
            </div>

            @auth
               <x-dropdown align="right" width="48">
                  <x-slot name="trigger">
                     <button
                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 dark:text-gray-400 bg-white dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none transition ease-in-out duration-150">
                        <div>{{ Auth::user()->name }}</div>

                        <div class="ms-1">
                           <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                              <path fill-rule="evenodd"
                                 d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                 clip-rule="evenodd" />
                           </svg>
                        </div>
                     </button>
                  </x-slot>

                  <x-slot name="content">
                     <x-dropdown-link :href="route('profile.edit')">
                        {{ __('Profile') }}
                     </x-dropdown-link>

                     <!-- Authentication -->
                     <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-dropdown-link :href="route('logout')"
                           onclick="event.preventDefault();
                                                   this.closest('form').submit();">
                           {{ __('Log Out') }}
                        </x-dropdown-link>
                     </form>
                  </x-slot>
               </x-dropdown>
            @else
               <div class="mx-3">
                  <x-nav-link :href="route('login')" :active="request()->routeIs('login')">{{ __('Login') }}</x-nav-link>
               </div>
               <div class="mx-3">
                  <x-nav-link :href="route('register')" :active="request()->routeIs('register')">{{ __('Register') }}</x-nav-link>
               </div>
            @endauth
         </div>


         <!-- Hamburger -->
         <div class="-me-2 flex items-center sm:hidden">
            <button @click="open = ! open"
               class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 dark:text-gray-500 hover:text-gray-500 dark:hover:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-900 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-900 focus:text-gray-500 dark:focus:text-gray-400 transition duration-150 ease-in-out">
               <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                  <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                  <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                     stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
               </svg>
            </button>
         </div>
      </div>
   </div>

   <!-- Responsive Navigation Menu -->
   <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">

      @if (Auth::check() && Auth::user()->userrole == 'admin')
         <x-responsive-nav-link :href="route('admin.dashboard')"
            :active="request()->routeIs('admin.dashboard')">{{ __('Dashboard Admin') }}</x-responsive-nav-link>
      @endif
      <x-responsive-nav-link :href="route('home')" :active="request()->routeIs('home')">{{ __('Home') }}</x-responsive-nav-link>
      <x-responsive-nav-link :href="route('products.index')" :active="request()->routeIs(['products.index', 'products.show'])">Produk</x-responsive-nav-link>
      <x-responsive-nav-link :href="route('about.index')" :active="request()->routeIs('about.index')">Tentang Kami</x-responsive-nav-link>
      <x-responsive-nav-link :href="route('contact.index')" :active="request()->routeIs('contact.index')">Kontak</x-responsive-nav-link>
      @auth
         <x-responsive-nav-link :href="route('cart.index')" :active="request()->routeIs('cart.index')">Keranjang</x-responsive-nav-link>
      @endauth


      <!-- Responsive Settings Options -->
      <div class="pt-4 pb-1 border-t border-gray-200 dark:border-gray-600">

         @auth
            <div class="px-4">
               <div class="font-medium text-base text-gray-800 dark:text-gray-200">{{ Auth::user()->name }}</div>
               <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>
            <div class="mt-3 space-y-1">
               <x-responsive-nav-link :href="route('profile.edit')">
                  {{ __('Profile') }}
               </x-responsive-nav-link>

               <!-- Authentication -->
               <form method="POST" action="{{ route('logout') }}">
                  @csrf

                  <x-responsive-nav-link :href="route('logout')"
                     onclick="event.preventDefault();
                                           this.closest('form').submit();">
                     {{ __('Log Out') }}
                  </x-responsive-nav-link>
               </form>
            </div>
         @else
            <div>
               <a href="{{ route('login') }}" class="mx-2">Login</a>
            </div>
            <div>
               <a href="{{ route('register') }}" class="mx-2">Register</a>
            </div>
         @endauth

      </div>
   </div>
</nav>