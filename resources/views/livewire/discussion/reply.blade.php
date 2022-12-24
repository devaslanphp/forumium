<!-- Modal body -->
<div class="p-6 space-y-6">
    <h3 class="text-xl font-medium text-slate-900 dark:text-white">{{ $reply?->id ? 'Update reply content' : 'Post a reply' }}</h3>
    <form>
        {{ $this->form }}
        <!-- Modal footer -->
        <div class="flex items-center space-x-2 rounded-b mt-5">
            <button wire:click="submit" type="button" wire:loading.attr="disabled"
                    class="text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                {{ $reply?->id ? 'Edit reply' : 'Add reply' }}
            </button>
            @if($reply?->id)
                <button type="button" wire:click="cancel()" wire:loading.attr="disabled" class="text-white bg-slate-700 disabled:bg-slate-300 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                    Cancel
                </button>
            @endif
        </div>
    </form>
</div>

@push('scripts')
    <script>
        window.addEventListener('replyAdded', () => {
            const hideReplyBtn = document.getElementById('hide-reply-modal');
            hideReplyBtn.click();
        });
    </script>
@endpush
