<div class="w-full flex flex-col gap-5">
    <div class="w-full flex flex-wrap gap-2 items-center">
        @if($user->socials->count())
            @foreach($user->socials as $social)
                <div class="w-full lg:max-w-xs max-w-full bg-white border border-slate-200 rounded dark:bg-slate-800 dark:border-slate-700">
                    <div class="flex justify-end px-4 pt-4">
                        <button id="{{ $social->provider }}-button" data-dropdown-toggle="{{ $social->provider }}" class="inline-block text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 focus:ring-4 focus:outline-none focus:ring-slate-200 dark:focus:ring-slate-700 rounded-lg text-sm p-1.5" type="button">
                            <span class="sr-only">Open dropdown</span>
                            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M6 10a2 2 0 11-4 0 2 2 0 014 0zM12 10a2 2 0 11-4 0 2 2 0 014 0zM16 12a2 2 0 100-4 2 2 0 000 4z"></path></svg>
                        </button>
                        <!-- Dropdown menu -->
                        <div id="{{ $social->provider }}" class="z-10 hidden text-base list-none bg-white divide-y divide-slate-100 rounded shadow w-44 dark:bg-slate-700">
                            <ul class="py-1" aria-labelledby="{{ $social->provider }}-button">
                                <li>
                                    <button type="button" wire:click="deleteProvider('{{ $social->provider }}')" class="w-full block px-4 py-2 text-sm text-red-600 hover:bg-slate-100 dark:hover:bg-slate-600 dark:text-slate-200 dark:hover:text-white">
                                        Unlink account
                                    </button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="flex flex-col items-center pb-10">
                        <div style="background-image: url('{{ asset('img/socials/' . $social->provider . '.svg') }}'); background-size: 70%;" class="bg-center bg-no-repeat h-24 w-24 bg-white shadow rounded-full"></div>
                        <h5 class="mb-1 text-xl font-medium text-slate-900 dark:text-white first-letter:uppercase">{{ $social->provider }}</h5>
                        <span class="text-sm text-slate-500 dark:text-slate-400">{{ $social->name }}</span>
                        <span class="text-sm text-slate-500 dark:text-slate-400">{{ $social->email }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <span class="font-light text-slate-700">
            No social accounts linked yet!
        </span>
        @endif
    </div>
    <div class="w-full flex flex-col gap-2">
        <span class="text-slate-600 font-medium text-sm">
            Link other social accounts:
        </span>
        <div class="w-full flex items-center gap-1">
            <button {!! $user->socials()->where('provider', 'facebook')->count() ? 'disabled' : '' !!} wire:loading.attr="disabled" type="button" wire:click="addProvider('facebook')" class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 mr-2 mb-2 disabled:bg-slate-300 disabled:hover:cursor-default">
                <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="facebook-f" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M279.1 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.4 0 225.4 0c-73.22 0-121.1 44.38-121.1 124.7v70.62H22.89V288h81.39v224h100.2V288z"></path></svg>
                Facebook
            </button>
            <button {!! $user->socials()->where('provider', 'github')->count() ? 'disabled' : '' !!} wire:loading.attr="disabled" type="button" wire:click="addProvider('github')" class="text-white bg-[#24292F] hover:bg-[#24292F]/90 focus:ring-4 focus:outline-none focus:ring-[#24292F]/50 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-slate-500 dark:hover:bg-[#050708]/30 mr-2 mb-2 disabled:bg-slate-300 disabled:hover:cursor-default">
                <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="github" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 496 512"><path fill="currentColor" d="M165.9 397.4c0 2-2.3 3.6-5.2 3.6-3.3 .3-5.6-1.3-5.6-3.6 0-2 2.3-3.6 5.2-3.6 3-.3 5.6 1.3 5.6 3.6zm-31.1-4.5c-.7 2 1.3 4.3 4.3 4.9 2.6 1 5.6 0 6.2-2s-1.3-4.3-4.3-5.2c-2.6-.7-5.5 .3-6.2 2.3zm44.2-1.7c-2.9 .7-4.9 2.6-4.6 4.9 .3 2 2.9 3.3 5.9 2.6 2.9-.7 4.9-2.6 4.6-4.6-.3-1.9-3-3.2-5.9-2.9zM244.8 8C106.1 8 0 113.3 0 252c0 110.9 69.8 205.8 169.5 239.2 12.8 2.3 17.3-5.6 17.3-12.1 0-6.2-.3-40.4-.3-61.4 0 0-70 15-84.7-29.8 0 0-11.4-29.1-27.8-36.6 0 0-22.9-15.7 1.6-15.4 0 0 24.9 2 38.6 25.8 21.9 38.6 58.6 27.5 72.9 20.9 2.3-16 8.8-27.1 16-33.7-55.9-6.2-112.3-14.3-112.3-110.5 0-27.5 7.6-41.3 23.6-58.9-2.6-6.5-11.1-33.3 2.6-67.9 20.9-6.5 69 27 69 27 20-5.6 41.5-8.5 62.8-8.5s42.8 2.9 62.8 8.5c0 0 48.1-33.6 69-27 13.7 34.7 5.2 61.4 2.6 67.9 16 17.7 25.8 31.5 25.8 58.9 0 96.5-58.9 104.2-114.8 110.5 9.2 7.9 17 22.9 17 46.4 0 33.7-.3 75.4-.3 83.6 0 6.5 4.6 14.4 17.3 12.1C428.2 457.8 496 362.9 496 252 496 113.3 383.5 8 244.8 8zM97.2 352.9c-1.3 1-1 3.3 .7 5.2 1.6 1.6 3.9 2.3 5.2 1 1.3-1 1-3.3-.7-5.2-1.6-1.6-3.9-2.3-5.2-1zm-10.8-8.1c-.7 1.3 .3 2.9 2.3 3.9 1.6 1 3.6 .7 4.3-.7 .7-1.3-.3-2.9-2.3-3.9-2-.6-3.6-.3-4.3 .7zm32.4 35.6c-1.6 1.3-1 4.3 1.3 6.2 2.3 2.3 5.2 2.6 6.5 1 1.3-1.3 .7-4.3-1.3-6.2-2.2-2.3-5.2-2.6-6.5-1zm-11.4-14.7c-1.6 1-1.6 3.6 0 5.9 1.6 2.3 4.3 3.3 5.6 2.3 1.6-1.3 1.6-3.9 0-6.2-1.4-2.3-4-3.3-5.6-2z"></path></svg>
                Github
            </button>
            <button {!! $user->socials()->where('provider', 'google')->count() ? 'disabled' : '' !!} wire:loading.attr="disabled" type="button" wire:click="addProvider('google')" class="text-white bg-[#DB4437] hover:bg-[#DB4437]/90 focus:ring-4 focus:outline-none focus:ring-[#DB4437]/50 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#DB4437]/55 mr-2 mb-2 disabled:bg-slate-300 disabled:hover:cursor-default">
                <svg class="mr-2 -ml-1 w-4 h-4" aria-hidden="true" focusable="false" data-prefix="fab" data-icon="google" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 488 512"><path fill="currentColor" d="M488 261.8C488 403.3 391.1 504 248 504 110.8 504 0 393.2 0 256S110.8 8 248 8c66.8 0 123 24.5 166.3 64.9l-67.5 64.9C258.5 52.6 94.3 116.6 94.3 256c0 86.5 69.1 156.6 153.7 156.6 98.2 0 135-70.4 140.8-106.9H248v-85.3h236.1c2.3 12.7 3.9 24.9 3.9 41.4z"></path></svg>
                Google
            </button>
        </div>
    </div>
</div>
