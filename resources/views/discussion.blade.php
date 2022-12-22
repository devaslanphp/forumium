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
                <div class="w-full flex flex-row justify-start items-center gap-5 text-white text-xs">
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2 text-shadow">
                            <i class="lg:flex hidden fa-regular fa-clock"></i> {{ $discussion->updated_at->diffForHumans() }}
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2 text-shadow">
                        <i class="lg:flex hidden fa-regular fa-message"></i> Created {{ $discussion->created_at->diffForHumans() }}
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2 text-shadow">
                        <i class="lg:flex hidden fa-solid fa-check"></i> Resolved
                    </span>
                    <span class="flex lg:flex-row flex-col justify-center lg:items-center items-start gap-2 text-shadow">
                        <i class="lg:flex hidden fa-regular fa-comments"></i> 0 replies / 0 comments
                    </span>
                </div>
            </div>
        </div>
    </div>

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex flex-row gap-10">
            <div class="flex flex-col lg:w-5/6 w-full">
                <div class="flex flex-row gap-5 w-full border-b border-slate-200 pb-5 mb-5">
                    <img src="{{ $discussion->user->avatarUrl }}" alt="Avatar" class="rounded-full w-16 h-16" />
                    <div class="w-full flex flex-col">
                        <span class="text-slate-700 font-medium">{{ $discussion->user->name }}</span>
                        <span class="text-slate-500 text-sm mt-1">{{ $discussion->created_at->diffForHumans() }}</span>
                        <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
                            {!! $discussion->content !!}
                        </div>
                    </div>
                </div>
            </div>
            <div class="lg:flex hidden flex-col gap-3 w-1/6">
                <button type="button" class="w-full bg-blue-500 hover:bg-blue-600 hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center">
                    Reply
                </button>
                <button type="button" id="follow-dropdown-btn" data-dropdown-toggle="follow-dropdown" class="w-full bg-slate-100 px-3 py-2 text-slate-500 border-slate-100 rounded hover:cursor-pointer hover:bg-slate-200">
                    <i class="fa-regular fa-star"></i> Follow
                </button>
                <div id="follow-dropdown" class="hidden z-10 w-64 bg-white rounded divide-y divide-slate-100 shadow dark:bg-slate-700">
                    <ul class="text-sm text-slate-700 dark:text-slate-200" aria-labelledby="follow-dropdown-btn">
                        <li>
                            <button type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                                    <i class="fa-regular fa-star"></i> Not Following
                                </div>
                                <span class="text-slate-500 text-xs">
                                    Be notified only when @mentioned.
                                </span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                                    <i class="fa-solid fa-star"></i> Following
                                </div>
                                <span class="text-slate-500 text-xs">
                                    Be notified of all replies.
                                </span>
                            </button>
                        </li>
                        <li>
                            <button type="button" class="text-left w-full flex flex-col gap-2 py-2 px-4 hover:bg-slate-100 dark:hover:bg-slate-600 dark:hover:text-white">
                                <div class="w-full flex items-center font-medium text-slate-700 gap-2">
                                    <i class="fa-regular fa-eye-slash"></i> Ignoring
                                </div>
                                <span class="text-slate-500 text-xs">
                                    Never be notified. Hide from the discussion list.
                                </span>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

</x-layout>
