@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Comments</x-slot>

    <div class="w-full">
        <livewire:profile.comments :user="$user" />
    </div>

</x-layout-profile>
