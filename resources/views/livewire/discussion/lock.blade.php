<button type="button" wire:click="toggleLockedFlag()" class="w-full {{ $discussion->is_locked ? 'bg-green-500 hover:bg-green-600' : 'bg-red-500 hover:bg-red-600' }} hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center flex items-center justify-center text-center gap-2">
    <div wire:loading.remove><i class="fa-solid {{ $discussion->is_locked ? 'fa-lock-open' : 'fa-lock' }}"></i></div>
    <div wire:loading><i class="fa fa-spin fa-spinner"></i></div>
    {{ $discussion->is_locked ? 'Unlock discussion' : 'Lock discussion' }}
</button>
