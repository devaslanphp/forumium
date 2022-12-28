@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Replies</x-slot>

    <div class="w-full">
        <livewire:profile.replies :user="$user" />
    </div>

</x-layout-profile>
