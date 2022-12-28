@php($user = $user ?? auth()->user())
<x-layout-profile :user="$user">

    <x-slot name="title">Settings</x-slot>

    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Account</span>
        <div class="w-full flex flex-wrap items-center gap-2">
            <button type="button" data-modal-toggle="change-password-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change password
            </button>
            <button type="button" data-modal-toggle="change-email-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change email
            </button>
            <button type="button" data-modal-toggle="change-username-modal" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Change your name
            </button>
        </div>
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Email address</span>
        <span class="text-xs text-slate-700">
            Your account's principal email address is: <span class="font-medium">{{ auth()->user()->email }}</span>
        </span>
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Profile details</span>
        <span class="text-xs text-slate-700 mb-5">
            Update your profile information
        </span>
        <livewire:profile.details />
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Linked accounts</span>
        <span class="text-xs text-slate-700">
            These linked accounts allow you to sign into the forum using other providers.
        </span>
        <livewire:profile.socials />
    </div>
    <div class="w-full flex flex-col gap-3">
        <span class="font-medium text-slate-700">Notifications</span>
        <span class="text-xs text-slate-700 mb-5">
            Choose how we should notify you.
        </span>
        <livewire:profile.notifications />
    </div>

    {{-- DIALOGS --}}
    @include('partials.profile.dialogs.password')
    @include('partials.profile.dialogs.email')
    @include('partials.profile.dialogs.username')

</x-layout-profile>
