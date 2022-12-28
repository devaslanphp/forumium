@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Discussions</x-slot>

    <div class="w-full">
        <livewire:profile.discussions :user="$user" />
    </div>

</x-layout-profile>
