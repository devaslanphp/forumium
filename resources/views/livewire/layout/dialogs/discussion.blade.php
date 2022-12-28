<div class="space-y-6 w-full flex flex-col mt-5">
    <form class="flex flex-col gap-5">
        {{ $this->form }}
        <!-- Modal footer -->
        <div class="flex items-center space-x-2 rounded-b">
            <button wire:click="submit" type="button" wire:loading.attr="disabled" class="text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ $discussion?->id ? 'Update discussion' : 'Post discussion' }}
            </button>
            @if($discussion?->id)
                <button type="button" wire:click="cancel()" wire:loading.attr="disabled" class="text-white bg-slate-700 disabled:bg-slate-300 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                    Cancel
                </button>
            @endif
        </div>
    </form>
</div>
