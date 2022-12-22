<x-layout-profile>

    <x-slot name="title">Settings</x-slot>

    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Account</span>
        <div class="w-full flex flex-wrap items-center gap-2">
            <button type="button" data-modal-toggle="change-password-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change password
            </button>
            <button type="button" data-modal-toggle="change-email-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change email
            </button>
            <button type="button" data-modal-toggle="change-username-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change your name
            </button>
        </div>
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Linked accounts</span>
        <span class="text-xs text-slate-700">
            These linked accounts allow you to sign into the forum using other providers.
        </span>
        <div class="w-full flex flex-wrap gap-2 items-center">
            <div class="w-full lg:max-w-xs max-w-full bg-white border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="facebook-button" data-dropdown-toggle="facebook" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="facebook" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="facebook-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div style="background-image: url('{{ asset('img/socials/facebook.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Facebook</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">EL OUFIR Hatim</span>
                </div>
            </div>
            <div class="w-full lg:max-w-xs max-w-full bg-white border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="twitter-button" data-dropdown-toggle="twitter" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="twitter" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="twitter-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div style="background-image: url('{{ asset('img/socials/twitter.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Twitter</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">@HatimOufir</span>
                </div>
            </div>
            <div class="w-full lg:max-w-xs max-w-full bg-white border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="github-button" data-dropdown-toggle="github" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="github" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="github-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div style="background-image: url('{{ asset('img/socials/github.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Github</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">heloufir</span>
                </div>
            </div>
            <div class="w-full lg:max-w-xs max-w-full bg-white border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="google-button" data-dropdown-toggle="google" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="google" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="google-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div style="background-image: url('{{ asset('img/socials/google.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Google</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">eloufirhatim@gmail.com</span>
                </div>
            </div>
            <div class="w-full lg:max-w-xs max-w-full bg-white border border-gray-200 rounded dark:bg-gray-800 dark:border-gray-700">
                <div class="flex justify-end px-4 pt-4">
                    <button id="apple-button" data-dropdown-toggle="apple" class="inline-block text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:ring-4 focus:outline-none focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-1.5" type="button">
                        <span class="sr-only">Open dropdown</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="apple" class="z-10 hidden text-base list-none bg-white divide-y divide-gray-100 rounded shadow w-44 dark:bg-gray-700">
                        <ul class="py-1" aria-labelledby="apple-button">
                            <li>
                                <a href="#" class="block px-4 py-2 text-sm text-red-600 hover:bg-gray-100 dark:hover:bg-gray-600 dark:text-gray-200 dark:hover:text-white">Delete</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="flex flex-col items-center pb-10">
                    <div style="background-image: url('{{ asset('img/socials/apple.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                    <h5 class="mb-1 text-xl font-medium text-gray-900 dark:text-white">Apple</h5>
                    <span class="text-sm text-gray-500 dark:text-gray-400">eloufirhatim1@gmail.com</span>
                </div>
            </div>
        </div>
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Notifications</span>
        <span class="text-xs text-slate-700 mb-5">
            Choose how we should notify you.
        </span>
        @livewire('profile.notifications')
    </div>

    {{-- DIALOGS --}}
    @include('partials.profile.dialogs.password')
    @include('partials.profile.dialogs.email')
    @include('partials.profile.dialogs.username')

</x-layout-profile>
