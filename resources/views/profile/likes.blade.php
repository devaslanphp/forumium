@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Likes</x-slot>

    <div class="w-full">
        <livewire:profile.likes :user="$user" />
    </div>

</x-layout-profile>
