<div class="w-fit">
    @if(
            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
            (
                auth()->user()->id === $discussion->user_id
                || auth()->user()->can(Permissions::EDIT_POSTS->value)
            )
        )
        <button type="button" wire:click="toggleResolvedFlag()" class="flex items-center gap-1 w-fit {{ $discussion->is_resolved ? 'bg-slate-500 hover:bg-slate-600' : 'bg-green-500 hover:bg-green-600' }} hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center text-xs">
            <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
            @if($discussion->is_resolved)
                <div wire:loading.remove><i class="fa-solid fa-rotate-left"></i></div> Repoen discussion
            @else
                <div wire:loading.remove><i class="fa-solid fa-check"></i></div> Mark as resolved
            @endif
        </button>
    @endif
</div>
