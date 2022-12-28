<x-layout>

    <x-slot name="title">{{ $title }}</x-slot>

    <div class="w-full h-52 bg-slate-400 flex flex-row justify-center items-center lg:px-0 px-6">
        <div class="container flex flex-row justify-start items-center gap-5">
            <livewire:profile.avatar />
            <div class="flex flex-col justify-center items-start gap-3">
                <div class="flex items-center gap-3">
                    <span class="text-xl font-medium text-white">
                        {{ $user->name }}
                    </span>
                    @include('partials.layouts.profile.roles-tags', compact('user'))
                </div>
                <div class="w-full lg:flex lg:flex-row grid grid-cols-2 justify-start items-center lg:gap-5 gap-2 text-white text-xs">
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-regular fa-clock"></i> {{ $user->updated_at->diffForHumans() }}
                    </span>
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-solid fa-sign-in"></i> Joined {{ $user->created_at->diffForHumans() }}
                    </span>
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-solid fa-check"></i> {{ $bestAnswers }} best {{ $bestAnswers > 1 ? 'answers' : 'answer' }}
                    </span>
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-solid fa-medal"></i> 0 points
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
