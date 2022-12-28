@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile - Best replies</x-slot>

    <div class="w-full">
        <livewire:profile.replies :user="$user" :isBest="true" />
    </div>

</x-layout-profile>
