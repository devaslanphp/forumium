<div class="w-full flex flex-col gap-5">
    <div class="w-full flex flex-wrap gap-2 items-center">
        @if($user->socials->count())
            @foreach($user->socials as $social)
                @if(Socials::isEnabled($social->provider))
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
                @endif
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
            @foreach(Socials::enabledCases() as $social)
                <button {!! $user->socials()->where('provider', $social)->count() ? 'disabled' : '' !!} wire:loading.attr="disabled" type="button" wire:click="addProvider('{{ $social }}')" class="text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2 disabled:bg-slate-300 disabled:hover:cursor-default"
                        @if(!$user->socials()->where('provider', $social)->count()) style="background-color: {{ '#' . Socials::color($social) }}" @endif>
                    @include('partials.dialogs.socials-icon.' . $social)
                    <span class="first-letter:uppercase">{{ $social }}</span>
                </button>
            @endforeach
        </div>
    </div>
</div>
