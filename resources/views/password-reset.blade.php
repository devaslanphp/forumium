<x-layout>

    <x-slot name="title">Forgot password</x-slot>

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container flex items-center justify-center py-10">
            <livewire:forgot-password :token="$token" />
        </div>
    </div>

</x-layout>
