<x-layout>

    <x-slot name="title">Home page</x-slot>

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex flex-row gap-10 max-w-5xl">
{{--            <div class="lg:flex hidden flex-col gap-10 w-1/6">--}}
{{--                @include('partials.home.side-menu')--}}
{{--            </div>--}}
            <div class="flex flex-col w-full">
                <livewire:discussions />
            </div>
        </div>
    </div>

</x-layout>
