<div class="space-y-6 w-full flex flex-col">
    <form>
        {{ $this->form }}
        <!-- Modal footer -->
        <div class="flex items-center space-x-2 rounded-b">
            <button wire:click="submit" type="button" wire:loading.attr="disabled" class="text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                Post discussion
            </button>
        </div>
    </form>
</div>
