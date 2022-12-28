@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Profile</x-slot>

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
            <li class="py-2 px-4 w-full rounded-t-lg border-b border-gray-200 dark:border-gray-600">
                <span class="text-slate-700 font-medium">Email address:</span>
                <span class="text-slate-500 @if(!$user->is_email_visible) italic font-light @endif">{{ $user->is_email_visible ? $user->email : 'Hidden' }}</span>
            </li>
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

</x-layout-profile>
