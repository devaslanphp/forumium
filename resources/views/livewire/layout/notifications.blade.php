@if(auth()->user() && auth()->user()->hasVerifiedEmail())
    <button type="button"
            x-data="{}"
            wire:click="openNotifications()"
            wire:poll.2000ms
            class="text-slate-700 font-medium text-lg w-10 h-10 flex items-center justify-center text-center relative mx-1 hover:bg-slate-100 rounded-full">
        <i class="fa-regular fa-bell"></i>
        @if($unreadNotificationsCount)
            <span
                class="absolute bottom-2 right-2 bg-red-500 flex items-center justify-center text-center font-medium rounded-full w-2 h-2"></span>
        @endif
    </button>
@endif
