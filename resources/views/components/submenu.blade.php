<nav class="">
    <div class="container mx-auto max-w-5xl">
        <div class="flex items-center">
            <ul class="flex flex-row font-medium mt-0 space-x-8 rtl:space-x-reverse text-sm">
                <li>
                    <a href="{{ route('communities.community.home', ['community'=>$community->slug]) }}" wire:navigate
                       .hover
                       class="text-base font-semibold dark:text-white pb-3 block {{ Route::is('communities.community.home') ?
                       'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{ Route::is('communities.community.home') ? 'page' : '' }}">Community</a>
                </li>
                <li>
                    <a href="{{ route('classroom',  ['community'=>$community->slug]) }}" wire:navigate.hover
                       class="text-base font-semibold dark:text-white pb-3 block {{ Route::is('classroom') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{ Route::is('classroom') ? 'page' : '' }}">Classroom</a>
                </li>
                <li>
                    <a href="{{ route('calendar',  ['community'=>$community->slug]) }}"
                       class="text-base font-semibold dark:text-white pb-3 block {{ Route::is('calendar') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{ Route::is('calendar') ? 'page' : '' }}">Calendar</a>
                </li>
                <li>
                    <a href="{{ route('member',  ['community'=>$community->slug]) }}"
                       class="text-base font-semibold dark:text-white pb-3 block {{ Route::is('member') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{ Route::is('member') ? 'page' : '' }}">Members</a>
                </li>
                <li>
                    <a href="{{ route('leaderboard',  ['community'=>$community->slug]) }}"
                       class="text-base font-semibold dark:text-white pb-3 block {{ Route::is('leaderboard') ? 'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{ Route::is('leaderboard') ? 'page' : '' }}">Leaderboards</a>
                </li>

                <li>
                    <a href="{{ route('communities.community.preview', [$community->slug]) }}" class="text-base
                    font-semibold dark:text-white pb-3 block {{ Route::is ('communities.community.preview') ?
                    'border-b-4 border-black' : 'text-gray-400' }}"
                       aria-current="{{  Route::is ('communities.community.preview') ? 'page' : '' }}">About</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
