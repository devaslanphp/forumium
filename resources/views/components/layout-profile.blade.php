<x-layout>

    <x-slot name="title">{{ $title }}</x-slot>

    <div class="w-full h-52 bg-slate-400 flex flex-row justify-center items-center lg:px-0 px-6">
        <div class="container flex flex-row justify-start items-center gap-5">
            <img src="{{ $user->avatarUrl }}" alt="Avatar" class="rounded-full w-24 h-24 border-4 border-white shadow" />
            <div class="flex flex-col justify-center items-start gap-3">
                <div class="flex items-center gap-3">
                    <span class="text-xl font-medium text-white">
                        {{ $user->name }}
                    </span>
                    @include('partials.layouts.profile.roles-tags', compact('user'))
                </div>
                <div class="w-full flex flex-row justify-start items-center gap-5 text-white text-xs">
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2">
                        <i class="lg:flex hidden fa-regular fa-clock"></i> {{ $user->updated_at->diffForHumans() }}
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2">
                        <i class="lg:flex hidden fa-solid fa-sign-in"></i> Joined {{ $user->created_at->diffForHumans() }}
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2">
                        <i class="lg:flex hidden fa-solid fa-check"></i> 0 best answer
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2">
                        <i class="lg:flex hidden fa-solid fa-medal"></i> 0 points
                    </span>
                </div>
            </div>
        </div>
    </div>

    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex lg:flex-row flex-col gap-10">
            <div class="flex flex-col gap-10 lg:w-1/6 w-full">
                @include('partials.layouts.profile.side-menu')
            </div>
            <div class="flex flex-col gap-8 lg:w-5/6 w-full">

                {{ $slot }}

            </div>
        </div>
    </div>

</x-layout>
