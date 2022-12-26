<x-layout>

    <x-slot name="title">Tag - {{ $tag->name }}</x-slot>

    <div class="w-full min-h-[150px] flex flex-row justify-center items-center lg:px-0 px-6" style="background-color: {{ $tag->color }}CC">
        <div class="container flex flex-col justify-center items-center gap-3 text-white text-center text-lg">
            <div class="w-full flex items-center justify-center gap-2 text-xl font-medium">
                <i class="{{ $tag->icon }}"></i> {{ $tag->name }}
            </div>
            <div class="w-full text-sm font-light">
                {!! nl2br(e($tag->description)) !!}
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex flex-row gap-10">
            <div class="lg:flex hidden flex-col gap-10 w-1/6">
                @include('partials.home.side-menu', ['tag' => $tag->id])
            </div>
            <div class="flex flex-col lg:w-5/6 w-full">
                <livewire:discussions :tag="$tag->id" />
            </div>
        </div>
    </div>

</x-layout>
