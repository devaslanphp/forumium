@php($bestAnswers = $user->replies()->where('is_best', true)->count())
<x-layout>

    <x-slot name="title">{{ $user->name }}</x-slot>

    <div class="w-full h-52 bg-slate-400 flex flex-row justify-center items-center lg:px-0 px-6">
        <div class="container flex flex-row justify-start items-center gap-5">
            <livewire:profile.avatar :user="$user" />
            @include('partials.layouts.profile.info', compact('user'))
        </div>
    </div>

    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex flex-col gap-5">

            <div class="w-full flex flex-col gap-3">
                <span class="font-medium text-slate-700 text-lg">{{ $user->name }} Bio</span>
                @if($user->bio)
                    <div class="text-slate-700">{!! nl2br(e($user->bio)) !!}</div>
                @else
                    <span class="text-slate-500">No bio available</span>
                @endif
            </div>

            <div class="w-full flex flex-col gap-3">
                <span class="font-medium text-slate-700 text-lg">Account details</span>
                <ul class="lg:w-1/2 w-full min-w-fit text-sm font-medium text-slate-900 bg-white rounded-lg border border-slate-200 dark:bg-slate-700 dark:border-slate-600 dark:text-white">
                    @if($user->is_email_visible)
                        <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                            <span class="text-slate-700 font-medium">Email address:</span>
                            <span class="text-slate-500">{{ $user->email }}</span>
                        </li>
                    @endif
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                        <span class="text-slate-700 font-medium">Account created:</span>
                        <span class="text-slate-500">{{ $user->created_at->diffForHumans() }}</span>
                    </li>
                    <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                        <span class="text-slate-700 font-medium">Last activity:</span>
                        <span class="text-slate-500">{{ $user->lastActivity->diffForHumans() }}</span>
                    </li>
                </ul>
            </div>

            <x-profile.stats :user="$user" />

        </div>
    </div>

</x-layout>
