@php($user = $user ?? auth()->user())

<div class="w-full">
    <div class="mb-10">
        <div class="text-slate-700 text-xl flex items-center gap-2 mb-2 font-semibold">
            {{$community->name}} Settings
            <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
        </div>
    </div>

    <div>
        {{$this->form}}

        <div class="flex justify-end">
            <x-controls.primary-button wire:click="submit" wire:loading.attr="disabled" custom-class="mt-3">
                Save
            </x-controls.primary-button>
        </div>
    </div>
</div>
