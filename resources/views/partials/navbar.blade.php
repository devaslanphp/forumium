@php
    $user = auth()->user();
@endphp

<!-- Nav bar -->
<div class="border-b bg-white">
    <nav class="p-2 sm:px-4 rounded w-full
items-center justify-center flex">
        <div class="container flex flex-wrap items-center justify-between mx-auto gap-3 max-w-5xl">
            <div class="flex items-center gap-2">
                <button @click="sidebarOpen = true"
                    class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg lg:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600">
                    <svg viewBox="0 0 20 20" class="w-6 h-6 fill-current"
                        :class="{ 'text-slate-600': !sidebarOpen, 'text-slate-300': sidebarOpen }">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>
                <a href="{{ route('home') }}" class="flex items-center">
                    <img src="{{ asset('favicon.svg') }}" class="h-6 mr-3 sm:h-9" alt="Logo" />
                    <span
                        class="self-center text-xl font-semibold whitespace-nowrap dark:text-white text-slate-500">{{ config('app.name') }}</span>
                </a>
            </div>
            <ul>
                <li>
                    <button data-collapse-toggle="switchCommunity" type="button"
                        class="h-[48px] w-[48px] text-stone-400 flex items-center justify-center rounded-full
                    hover:bg-stone-300 hover:text-black">
                        <svg class="w-[12px]" viewBox="0 0 12 20" fill="currentColor"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M0.702509 13.2926C1.09284 12.8995 1.72829 12.8984 2.12 13.2901L4.58579 15.7559C5.36684 16.5369 6.63316 16.5369 7.41421 15.7559L9.88 13.2901C10.2717 12.8984 10.9072 12.8995 11.2975 13.2926C11.6859 13.6837 11.6848 14.3153 11.295 14.7051L7.41421 18.5859C6.63317 19.3669 5.36684 19.3669 4.58579 18.5859L0.705005 14.7051C0.315239 14.3153 0.314123 13.6837 0.702509 13.2926Z"
                                fill="currentColor"></path>
                            <path
                                d="M11.2975 7.28749C10.9072 7.68059 10.2717 7.68171 9.88 7.28999L7.41421 4.82421C6.63316 4.04316 5.36684 4.04316 4.58579 4.82421L2.12 7.28999C1.72829 7.68171 1.09284 7.68059 0.702509 7.28749C0.314123 6.89635 0.315239 6.26476 0.705005 5.87499L4.58579 1.99421C5.36683 1.21316 6.63316 1.21316 7.41421 1.99421L11.295 5.87499C11.6848 6.26476 11.6859 6.89635 11.2975 7.28749Z"
                                fill="currentColor"></path>
                        </svg>
                    </button>
                    <div id="switchCommunity"
                        class="absolute z-10 hidden font-normal bg-white divide-y divide-gray-100
                    rounded-lg shadow-lg w-80 border dark:bg-gray-700 dark:divide-gray-600 translate-x-[-40%]">
                        <ul class="py-2 text-sm text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                            <li>
                                <a href="/signup"
                                    class="text-lg block px-4 py-2 hover:bg-custom-primary
                                    dark:hover:bg-custom-primary
                                dark:hover:text-white flex items-center gap-2 px-[15px] py-[14px] font-semibold">
                                    <i
                                        class="fa fa-plus text-xl w-10 h-10 grid place-items-center bg-stone-300
                                    text-stone-400 rounded-lg"></i>
                                    Create a Community</a>
                            </li>
                            <li>
                                <a href="{{ route('communities.discovery') }}"
                                    class="text-lg block px-4 py-2 hover:bg-custom-primary
                                    dark:hover:bg-custom-primary
                                dark:hover:text-white flex items-center gap-2 px-[15px] py-[14px] font-semibold">
                                    <i
                                        class="fa-solid fa-compass text-xl w-10 h-10 grid place-items-center bg-stone-300
                                    text-stone-400 rounded-lg"></i>
                                    Discover Communities </a>
                            </li>
                            @if ($user)
                                @foreach ($user->communities as $community)
                                    <li>
                                        <livewire:communities.components.community-logo-name :community="$community" is-link
                                            custom-class="px-4 py-2 hover:bg-custom-primary
                                    dark:hover:bg-custom-primary dark:hover:text-white" />
                                    </li>
                                @endforeach
                            @endif

                        </ul>
                    </div>
                </li>
            </ul>
            <div class="flex md:order-2 items-center">
                <livewire:layout.notifications />

                <button type="button" data-collapse-toggle="navbar-search" aria-controls="navbar-search"
                    aria-expanded="false"
                    class="md:hidden text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none focus:ring-4 focus:ring-slate-200 dark:focus:ring-slate-700 rounded-lg text-sm p-2.5 mr-1">
                    <svg class="w-5 h-5" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
                <button data-collapse-toggle="navbar-search" type="button"
                    class="inline-flex items-center p-2 text-sm text-slate-500 rounded-lg md:hidden hover:bg-slate-100 focus:outline-none focus:ring-2 focus:ring-slate-200 dark:text-slate-400 dark:hover:bg-slate-700 dark:focus:ring-slate-600"
                    aria-controls="navbar-search" aria-expanded="false">
                    <span class="sr-only">Open menu</span>
                    <svg class="w-8 h-8" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z"
                            clip-rule="evenodd"></path>
                    </svg>
                </button>

                <ul
                    class="flex flex-col p-4 mt-4 border border-slate-100 rounded-lg bg-slate-50 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium md:border-0 md:bg-white dark:bg-slate-800 md:dark:bg-slate-900 dark:border-slate-700">
                    @if (auth()->guest() || (!auth()->guest() && !auth()->user()->hasVerifiedEmail()))
                        @if (Configurations::case('Enable registration'))
                            <li>
                                <button type="button" data-modal-toggle="sign-up-modal"
                                    class="block py-2 pl-3 pr-4 text-slate-700 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 md:dark:hover:text-white dark:text-slate-400 dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700">
                                    Sign up
                                </button>
                            </li>
                        @endif
                        <li>
                            <button type="button" data-modal-toggle="login-modal"
                                class="block py-2 pl-3 pr-4 text-slate-700 rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-slate-400 md:dark:hover:text-white dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700">
                                Log in
                            </button>
                        </li>
                    @endif
                    @if (!auth()->guest() && auth()->user()->hasVerifiedEmail())
                        <li>
                            <button type="button" id="profile-dropdown" data-dropdown-toggle="dropdown"
                                class="flex items-center gap-2 py-2 pl-3 pr-4 {{ Route::is('profile.*') ? 'text-blue-700' : 'text-slate-700' }} rounded hover:bg-slate-100 md:hover:bg-transparent md:hover:text-blue-700 md:p-0 dark:text-slate-400 md:dark:hover:text-white dark:hover:bg-slate-700 dark:hover:text-white md:dark:hover:bg-transparent dark:border-slate-700"
                                aria-current="page">
                                <img src="{{ auth()->user()->avatarUrl }}" alt="Avatar"
                                    class="rounded-full w-8 h-8 border order-slate-200 shadow" />
                            </button>

                            <div id="dropdown"
                                class="hidden z-10 w-44 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700">
                                <ul class="py-1 text-sm text-slate-700 dark:text-slate-200"
                                    aria-labelledby="profile-dropdown">
                                    <li>
                                        <a href="{{ route('profile.index') }}"
                                            class="flex items-center gap-2 py-2 px-4 text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            <i class="fa-solid fa-user w-[20px]"></i> Profile
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ route('profile.settings') }}"
                                            class="flex items-center gap-2 py-2 px-4 text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                            <i class="fa-solid fa-cog w-[20px]"></i> Settings
                                        </a>
                                    </li>
                                    @if (auth()->user()->has(Roles::ADMIN->value))
                                        <li>
                                            <a href="{{ route('filament.pages.dashboard') }}"
                                                class="flex items-center gap-2 py-2 px-4 text-slate-600 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                                <i class="fa-solid fa-gears w-[20px]"></i> Administration
                                            </a>
                                        </li>
                                    @endif
                                </ul>
                                <div class="py-1">
                                    <a href="{{ route('logout') }}"
                                        class="flex items-center gap-2 py-2 px-4 text-red-600 hover:bg-red-100 dark:hover:bg-red-600 dark:hover:text-white">
                                        <i class="fa-solid fa-sign-out w-[20px]"></i> Sign out
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endif
                </ul>
            </div>
            <div class="items-center justify-between hidden w-full md:flex md:w-auto md:order-1 grow"
                id="navbar-search">
                <div class="relative mt-3 md:hidden">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-slate-500" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="search-navbar"
                        class="block w-full p-2 pl-10 text-sm text-slate-900 border border-slate-300 rounded-lg
                           bg-slate-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700
                           dark:border-slate-600 dark:placeholder-slate-400 dark:text-white dark:focus:ring-blue-500
                           dark:focus:border-blue-500 h-[48px]"
                        placeholder="Search...">
                </div>
                <div class="relative hidden md:block w-full">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        <svg class="w-5 h-5 text-slate-500" aria-hidden="true" fill="currentColor"
                            viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span class="sr-only">Search icon</span>
                    </div>
                    <form action="{{ route('search') }}" method="GET" class="w-full">
                        <input type="search" id="search-navbar" name="q" value="{{ request('q') }}"
                            minlength="3" required
                            class="block w-full p-2 pl-10 text-sm text-slate-900 border-none
                               rounded-lg bg-stone-200 focus:ring-blue-500 focus:border-blue-500 dark:bg-slate-700
                               dark:border-slate-600 dark:placeholder-slate-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500 h-[48px]"
                            placeholder="Search...">
                    </form>
                </div>

            </div>
        </div>
    </nav>
    <nav class="">
        <div class="container mx-auto max-w-5xl">
            <div class="flex items-center">
                <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                    <li>
                        <a href="{{ route('home') }}" wire:navigate.hover
                            class="text-base font-semibold dark:text-white pb-3 block {{ request()->is('/') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                            aria-current="{{ request()->is('/') ? 'page' : '' }}">Community</a>
                    </li>
                    <li>
                        <a href="{{ route('classroom') }}" wire:navigate.hover
                            class="text-base font-semibold dark:text-white pb-3 block {{ request()->is('classroom') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                            aria-current="{{ request()->is('classroom') ? 'page' : '' }}">Classroom</a>
                    </li>
                    <li>
                        <a href="{{ route('calendar') }}"
                            class="text-base font-semibold dark:text-white pb-3 block {{ request()->is('calendar') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                            aria-current="{{ request()->is('calendar') ? 'page' : '' }}">Calendar</a>
                    </li>
                    <li>
                        <a href="{{ route('member') }}"
                            class="text-base font-semibold dark:text-white pb-3 block {{ request()->is('member') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                            aria-current="{{ request()->is('member') ? 'page' : '' }}">Members</a>
                    </li>
                    <li>
                        <a href="{{ route('leaderboard') }}"
                            class="text-base font-semibold dark:text-white pb-3 block {{ request()->is('leaderboard') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                            aria-current="{{ request()->is('leaderboard') ? 'page' : '' }}">Leaderboards</a>
                    </li>

                    <li>
                        <a href="#" class="text-gray-400 dark:text-white pb-3 text-base font-semibold">About</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
