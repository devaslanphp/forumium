<x-layout>

    <x-slot name="title">{{ $title }}</x-slot>

    <div class="w-full h-52 bg-slate-400 flex flex-row justify-center items-center lg:px-0 px-6">
        <div class="container flex flex-row justify-start items-center gap-5">
            <livewire:profile.avatar :user="$user" />
            @include('partials.layouts.profile.info', compact('user'))
        </div>
    </div>

    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex lg:flex-row flex-col gap-10">
            <div class="flex flex-col gap-10 lg:w-1/6 w-full">
                @include('partials.layouts.profile.side-menu', compact('user'))
            </div>
            <div class="flex flex-col gap-8 lg:w-5/6 w-full">

                {{ $slot }}

            </div>
        </div>
    </div>

</x-layout>
