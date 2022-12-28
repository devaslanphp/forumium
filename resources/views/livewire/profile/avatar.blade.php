<div class="w-fit flex flex-col justify-center items-center gap-2 relative">
    <div class="w-fit flex flex-col relative hovered-section">
        @if($user->id == auth()->user()->id)
            <label for="picture" class="z-40 w-24 h-24 absolute top-0 left-0 right-0 bottom-0 bg-slate-900/50 flex flex-col justify-center items-center text-center text-white text-2xl rounded-full hover-action hover:cursor-pointer">
                <i class="fa-solid fa-arrow-up-from-bracket"></i>
            </label>
            <div wire:loading.flex class="z-50 w-24 h-24 absolute top-0 left-0 right-0 bottom-0 bg-slate-900/50 flex-col justify-center items-center text-center text-white text-2xl rounded-full hover:cursor-pointer">
                <i class="fa fa-spin fa-spinner"></i>
            </div>
            <input type="file" id="picture" name="picture" class="hidden" wire:model="picture" />
        @endif
        <img src="{{ $user->avatarUrl }}" alt="Avatar" class="rounded-full w-24 h-24 border-4 border-white shadow" />
    </div>
    @if($user->picture && $user->id == auth()->user()->id)
        <button type="button" wire:click="deleteProfilePicture()" wire:loading.attr="disabled" class="absolute -bottom-9 flex justify-center items-center text-center gap-1 w-8 h-8 bg-red-500 disabled:bg-slate-300 hover:bg-red-600 text-white hover:cursor-pointer px-3 py-2 rounded-full shadow hover:shadow-lg font-medium text-center text-xs">
            <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
            <div wire:loading.remove>
                <i class="fa-regular fa-trash-can"></i>
            </div>
        </button>
    @endif
</div>
