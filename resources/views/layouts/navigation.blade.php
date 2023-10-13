<header
    x-data="{
        mobileMenuOpen: false,
        cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
    }"
    @cart-change.window="cartItemsCount = $event.detail.count"
    class="flex justify-between bg-gradient-to-r from-cyan-500 to-blue-700 shadow-md text-white rounded-b-2xl"
>
    <a href="{{ route('home') }}" class="block p-4">
        <img class="rounded-full w-12 h-12" src="https://i.pinimg.com/564x/eb/71/57/eb7157902a2b0f1737e1d2e8ef55df48.jpg" alt="E-refill logo"> 
    </a>
    <!-- Responsive Menu -->
    <div class="block fixed z-10 top-0 bottom-0 height h-full w-[220px] transition-all bg-blue-900 md:hidden" :class="mobileMenuOpen ? 'left-0' : '-left-[220px]'">
        <ul class="mt-2">
            <li>
                <a href="{{ route('cart.index') }}" class="relative flex items-center justify-between py-2 px-3 transition-colors hover:bg-blue-800">
                    <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -mt-1" width="28" height="28" viewBox="0 0 24 24">
                            <path fill="currentColor" d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 20.01 4H5.21l-.94-2H1v2h2l3.6 7.59l-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2z"/>
                        </svg>
                        Cart
                    </div>
                    <!-- Cart Items Counter -->
                    <small
                        x-show="cartItemsCount"
                        x-transition
                        x-text="cartItemsCount"
                        x-cloak
                        class="py-[2px] px-[8px] rounded-full bg-red-500"
                    ></small>
                    <!--/ Cart Items Counter -->
                </a>
            </li>
            @if (!Auth::guest())
            <li x-data="{open: false}" class="relative">
                <a @click="open = !open" class="cursor-pointer flex justify-between items-center py-2 px-3 hover:bg-blue-800">
                    <span class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />
                        </svg>
                        My Account
                    </span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <ul
                    x-show="open"
                    x-transition
                    class="z-10 right-0 bg-blue-800 py-2"
                >
                    <li>
                        <a href="{{ route('profile') }}" class="flex px-3 py-2 hover:bg-blue-700 hover:text-white">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            My Profile
                        </a>
                    </li>
                    <li class="hover:bg-blue-900">
                        <a
                            href="{{ route('order.index') }}"
                            class="flex items-center px-3 py-2 hover:bg-blue-700 hover:text-white"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                />
                            </svg>
                            My Orders
                        </a>
                    </li>
                    <li class="hover:bg-blue-900">
                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                class="flex items-center px-3 py-2 hover:bg-slate-900"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li>
                <a
                    href="{{ route('login') }}"
                    class="flex items-center py-2 px-3 transition-colors hover:bg-slate-800"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-6 w-6 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                        />
                    </svg>
                    Login
                </a>
            </li>
            <li class="px-3 py-3">
                <a href="{{ route('register') }}" class="block text-center text-white bg-yellow-600 py-2 px-3 rounded shadow-md hover:bg-yellow-700 active:bg-yellow-800 transition-colors w-full">
                    Register now
                </a>
            </li>
            @endif
        </ul>
    </div>
    <!--/ Responsive Menu -->
    <nav class="hidden md:block">
        <ul class="grid grid-flow-col items-center mt-1">
            <li>
                <a href="{{ route('cart.index') }}" class="relative inline-flex items-center py-navbar-item px-navbar-item hover:bg-blue-900 hover:rounded-xl">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2 -mt-1" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M15.55 13c.75 0 1.41-.41 1.75-1.03l3.58-6.49A.996.996 0 0 0 20.01 4H5.21l-.94-2H1v2h2l3.6 7.59l-1.35 2.44C4.52 15.37 5.48 17 7 17h12v-2H7l1.1-2h7.45zM6.16 6h12.15l-2.76 5H8.53L6.16 6zM7 18c-1.1 0-1.99.9-1.99 2S5.9 22 7 22s2-.9 2-2s-.9-2-2-2zm10 0c-1.1 0-1.99.9-1.99 2s.89 2 1.99 2s2-.9 2-2s-.9-2-2-2z"/>
                    </svg>
                    Cart
                    <small
                        x-show="cartItemsCount"
                        x-transition
                        x-cloak
                        x-text="cartItemsCount"
                        class="absolute z-[100] top-4 -right-3 py-[2px] px-[8px] rounded-full bg-red-500"
                    ></small>
                </a>
            </li>
            @if (!Auth::guest())
            <li x-data="{open: false}" class="relative">
                <a @click="open = !open" class="cursor-pointer flex items-center py-navbar-item px-navbar-item pr-5 hover:bg-blue-900 hover:rounded-xl mr-1">
                    <span class="flex items-center">
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="h-5 w-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                        />
                        </svg>
                        My Account
                    </span>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="h-5 w-5 ml-2"
                        viewBox="0 0 20 20"
                        fill="currentColor"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                            clip-rule="evenodd"
                        />
                    </svg>
                </a>
                <ul
                    @click.outside="open = false"
                    x-show="open"
                    x-transition
                    x-cloak
                    class="absolute z-10 right-0 bg-white text-blue-500 py-0 w-48 mt-1 mr-4 rounded-b-md"
                >
                    <li>
                        <a href="{{ route('profile') }}" class="flex px-3 py-2 hover:bg-blue-700 hover:text-white">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                />
                            </svg>
                            My Profile
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('order.index') }}" class="flex px-3 py-2 hover:bg-blue-700 hover:text-white">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-5 w-5 mr-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="2"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                />
                            </svg>
                            My Orders
                        </a>
                    </li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a href="{{ route('logout') }}"
                                class="flex px-3 py-2 hover:bg-blue-700 hover:text-white hover:rounded-b-md"
                                onclick="event.preventDefault();
                                    this.closest('form').submit();">
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="h-5 w-5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                    />
                                </svg>
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    </li>
                </ul>
            </li>
            @else
            <li>
                <a href="{{ route('login') }}" class="flex items-center py-navbar-item px-navbar-item hover:bg-blue-900">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" width="28" height="28" viewBox="0 0 24 24">
                        <path fill="currentColor" d="M11 7L9.6 8.4l2.6 2.6H2v2h10.2l-2.6 2.6L11 17l5-5l-5-5zm9 12h-8v2h8c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2h-8v2h8v14z"/>
                    </svg>
                    Login
                </a>
            </li>
            <li>
                <a
                    href="{{ route('register') }}"
                    class="inline-flex font-bold items-center text-white bg-yellow-500 py-2 px-3 rounded shadow-md hover:bg-yellow-700 active:bg-yellow-800 transition-colors mx-5"
                >
                    Register now
                </a>
            </li>
            @endif
        </ul>
    </nav>
    <button
        @click="mobileMenuOpen = !mobileMenuOpen"
        class="p-4 block md:hidden"
    >
        <svg
            xmlns="http://www.w3.org/2000/svg"
            class="h-6 w-6"
            fill="none"
            viewBox="0 0 24 24"
            stroke="currentColor"
            stroke-width="2"
        >
            <path
                stroke-linecap="round"
                stroke-linejoin="round"
                d="M4 6h16M4 12h16M4 18h16"
            />
        </svg>
    </button>
</header>
