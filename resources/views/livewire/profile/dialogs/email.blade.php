<form wire:submit.prevent="change">
    {{ $this->form }}
    <button type="submit" wire:loading.attr="disabled" class="mt-6 w-full text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Change email address
    </button>
</form>
