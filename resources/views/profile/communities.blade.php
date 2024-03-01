@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Communities</x-slot>

    <div class="w-full">
        <div class="mb-10">
            <div class="text-slate-700 text-xl flex items-center gap-2 mb-2 font-semibold">
                @if(auth()->user()->id == $user->id)
                    Your Communities
                @else
                    Communities
                @endif
                <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
            </div>
            <div>
                [Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi at cumque eius
                eligendi]
            </div>
        </div>

        <livewire:community.components.community-list/>
    </div>
</x-layout-profile>
