<div class="flex flex-row gap-5 w-full border-b border-slate-200 pb-5 mb-5 reply-item">
    <img src="{{ $reply->user->avatarUrl }}" alt="Avatar" class="rounded-full w-16 h-16" />
    <div class="w-full flex flex-col">
        <span class="text-slate-700 font-medium">{{ $reply->user->name }}</span>
        <span class="text-slate-500 text-sm mt-1">{{ $reply->created_at->diffForHumans() }}</span>
        <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
            {!! $reply->content !!}
        </div>
        <div class="w-full flex items-center gap-5 text-slate-500 text-xs mt-5">
            <button type="button" class="flex items-center gap-2 hover:cursor-pointer" wire:click="toggleLike()">
                <i class="fa-regular fa-thumbs-up"></i> {{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}
            </button>
            <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                <i class="fa-regular fa-comment"></i> {{ $comments }} {{ $comments > 1 ? 'Comments' : 'Comment' }}
            </button>
            @if(
                auth()->user()->id === $reply->user_id
                || auth()->user()->can(Permissions::EDIT_POSTS->value)
            )
                <button data-modal-toggle="edit-reply-modal-{{ $reply->id }}" type="button" class="flex items-center gap-2 hover:cursor-pointer text-blue-500 hover:underline hover-action">
                    Edit
                </button>
            @endif
            @if(
                auth()->user()->id === $reply->user_id
                || auth()->user()->can(Permissions::DELETE_POSTS->value)
            )
                <button wire:click="delete()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-red-500 hover:underline hover-action">
                    Delete
                </button>
            @endif
        </div>
    </div>

    <!-- Edit a reply modal -->
    <div id="edit-reply-modal-{{ $reply->id }}" data-modal-placement="bottom-center" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-7xl md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button id="hide-reply-modal-{{ $reply->id }}" type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" data-modal-toggle="edit-reply-modal-{{ $reply->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <livewire:discussion.reply :discussion="$reply->discussion" :reply="$reply" />
            </div>
        </div>
    </div>
</div>
