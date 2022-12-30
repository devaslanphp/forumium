<div class="w-full">
    @if(!$discussion->is_locked)
        <button type="button" id="follow-dropdown-btn" data-dropdown-toggle="follow-dropdown"
                class="w-full {{ $bgClass }} px-3 py-2 text-white border-slate-100 rounded hover:cursor-pointer">
            <div wire:loading.remove>
                @switch($type)
                    @case(Followers::NONE->value)
                        <i class="fa-regular fa-star"></i> Follow
                        @break
                    @case(Followers::FOLLOWING->value)
                        <i class="fa-solid fa-star"></i> Following
                        @break
                    @case(Followers::NOT_FOLLOWING->value)
                        <i class="fa-regular fa-star"></i> Not following
                        @break
                    @case(Followers::IGNORING->value)
                        <i class="fa-regular fa-eye-slash"></i> Ignoring
                        @break
                @endswitch
            </div>
            <div wire:loading>
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </button>
        <div id="follow-dropdown" class="hidden z-10 w-64 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700" wire:ignore>
            <ul class="text-sm text-slate-700 dark:text-slate-200" aria-labelledby="follow-dropdown-btn">
                <li>
                    <button wire:click="toggle('{{ Followers::NOT_FOLLOWING->value }}')" type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                        <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                            <i class="fa-regular fa-star"></i> Not Following
                        </div>
                        <span class="text-slate-500 text-xs">
                        Be notified only when @mentioned.
                    </span>
                    </button>
                </li>
                <li>
                    <button wire:click="toggle('{{ Followers::FOLLOWING->value }}')" type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                        <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                            <i class="fa-solid fa-star"></i> Following
                        </div>
                        <span class="text-slate-500 text-xs">
                        Be notified of all replies.
                    </span>
                    </button>
                </li>
                <li>
                    <button wire:click="toggle('{{ Followers::IGNORING->value }}')" type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                        <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                            <i class="fa-regular fa-eye-slash"></i> Ignoring
                        </div>
                        <span class="text-slate-500 text-xs">
                        Never be notified. Hide from the discussion list.
                    </span>
                    </button>
                </li>
            </ul>
        </div>
    @endif
</div>
