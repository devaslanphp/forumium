<!-- Modal body -->
<div class="p-6 space-y-6">
    <h3 class="mb-8 text-xl font-medium text-slate-900 dark:text-white">Post a reply</h3>
    <form>
        {{ $this->form }}
        <!-- Modal footer -->
        <div class="flex items-center space-x-2 rounded-b mt-5">
            <button wire:click="submit" type="button" wire:loading.attr="disabled"
                    class="text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Add reply
            </button>
        </div>
    </form>
</div>

@push('scripts')
    <script>
        Livewire.on('replyAdded', () => {
            const hideReplyBtn = document.getElementById('hide-reply-modal');
            hideReplyBtn.click();
        });
    </script>
@endpush
