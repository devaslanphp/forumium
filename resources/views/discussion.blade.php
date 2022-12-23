<x-layout>

    <x-slot name="title">{{ $discussion->name }}</x-slot>

    <div class="w-full h-52 flex flex-row justify-center items-center lg:px-0 px-6" style="background-color: {{ $discussion->tags->first()->color }}CC">
        <div class="container flex flex-row justify-start items-center gap-5">
            <div class="flex flex-col justify-center items-start gap-3">
                <div class="flex flex-col gap-2">
                    <span class="text-xl font-medium text-white text-shadow-lg">
                        {{ $discussion->name }}
                    </span>
                    @include('partials.discussions.tags', ['tags' => $discussion->tags])
                </div>
                <livewire:discussion.header :discussion="$discussion" />
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex lg:flex-row flex-col gap-10">
            <div class="flex flex-col lg:w-5/6 w-full lg:order-1 order-2">
                <livewire:discussion.discussion-details :discussion="$discussion" />
                @php($replies = $discussion->replies()->count())
                @if($replies)
                    <div class="w-full flex flex-col gap-5 mb-10">
                        <span class="text-slate-700 text-lg">
                            {{ $replies }} {{ $replies > 1 ? 'Replies' : 'Reply' }}
                        </span>
                    </div>
                @endif
                <livewire:discussion.replies :discussion="$discussion" />
            </div>
            <div class="flex lg:flex-col flex-row gap-3 lg:w-1/6 w-full lg:order-2 order-1">
                <button type="button" data-modal-toggle="add-reply-modal" class="w-full bg-blue-500 hover:bg-blue-600 hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center">
                    Reply
                </button>
                <livewire:discussion.follow :discussion="$discussion" />
            </div>
        </div>
    </div>

    <!-- Add a discussion modal -->
    <div id="add-reply-modal" data-modal-placement="bottom-center" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button id="hide-reply-modal" type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" data-modal-toggle="add-reply-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <livewire:discussion.reply :discussion="$discussion" />
            </div>
        </div>
    </div>


</x-layout>
