@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Ignoring discussions</x-slot>

    <div class="w-full">
        <livewire:profile.discussions :user="$user" :follow="Followers::IGNORING->value" />
    </div>

</x-layout-profile>
