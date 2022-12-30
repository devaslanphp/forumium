<div class="flex flex-row w-full border-b border-slate-200 py-5 hovered-section" id="reply-{{ $reply->id }}">
    <div class="flex flex-col gap-5 w-20">
        <a @if(auth()->user() && auth()->user()->hasVerifiedEmail()) href="{{ route('user.index', ['user' => $reply->user, 'slug' => Str::slug($reply->user->name)]) }}" @else data-modal-toggle="login-modal" @endif class="hover:cursor-pointer">
            <div class="bg-cover bg-center rounded-full w-16 h-16 border border-slate-200 shadow" style="background-image: url({{ $reply->user->avatarUrl }})"></div>
        </a>
        @if(
            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
            (
                auth()->user()->id === $reply->user_id
                || auth()->user()->can(Permissions::EDIT_POSTS->value)
            )
        )
            <button wire:click="toggleBestFlag()" class="w-16 text-center bg-transparent text-4xl flex justify-center items-center {{ $reply->is_best ? 'text-green-500 hover:text-green-500/80' : 'text-slate-500 hover:text-slate-500/80 hover-action' }}">
                <i class="fa-solid fa-check"></i>
            </button>
        @endif
    </div>
    <div class="w-full flex flex-col">
        <a @if(auth()->user() && auth()->user()->hasVerifiedEmail()) href="{{ route('user.index', ['user' => $reply->user, 'slug' => Str::slug($reply->user->name)]) }}" @else data-modal-toggle="login-modal" @endif class="hover:cursor-pointer hover:underline text-slate-700 font-medium">{{ $reply->user->name }}</a>
        <span class="text-slate-500 text-sm mt-1">{{ $reply->created_at->diffForHumans() }}</span>
        @if($edit)
            <livewire:discussion.reply :discussion="$reply->discussion" :reply="$reply" />
        @else
            <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
                {!! $reply->content !!}
            </div>
        @endif
        <div class="w-full flex items-center gap-5 text-slate-500 text-xs mt-5">
            @if(
                    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                    (
                        auth()->user()->id === $reply->user_id
                        || auth()->user()->can(Permissions::LIKE_POSTS->value)
                    )
                )
                <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                    <i class="@if(auth()->user() && auth()->user()->hasVerifiedEmail() && $reply->likes()->where('user_id', auth()->user()->id)->count()) fa-solid text-red-500 @else fa-regular @endif fa-thumbs-up" wire:click="toggleLike()"></i>
                    <span onclick="window.openModal('reply-likes-modal-{{ $reply->id }}')">{{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}</span>
                </button>
            @else
                <div class="flex items-center gap-2">
                    <i class="@if(auth()->user() && auth()->user()->hasVerifiedEmail() && $reply->likes()->where('user_id', auth()->user()->id)->count()) fa-solid text-red-500 @else fa-regular @endif fa-thumbs-up"></i> {{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}
                </div>
            @endif
            <button type="button" wire:click="toggleComments()" class="flex items-center gap-2 hover:cursor-pointer toggle-comments">
                <i class="fa-regular fa-comment"></i> {{ $comments }} {{ $comments > 1 ? 'Comments' : 'Comment' }}
            </button>
            @if(
                (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                (
                    auth()->user()->id === $reply->user_id
                    || auth()->user()->can(Permissions::EDIT_POSTS->value)
                ) && (
                    !$edit
                ) && !$reply->discussion->is_locked
            )
                <button wire:click="edit()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-blue-500 hover:underline hover-action">
                    Edit
                </button>
            @endif
            @if(
                (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                (
                    auth()->user()->id === $reply->user_id
                    || auth()->user()->can(Permissions::DELETE_POSTS->value)
                ) && (
                    !$edit
                ) && !$reply->discussion->is_locked
            )
                <button wire:click="delete()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-red-500 hover:underline hover-action">
                    Delete
                </button>
            @endif
            <div wire:loading>
                <i class="fa fa-spinner fa-spin"></i>
            </div>
        </div>
        @include('partials.discussions.comments-section', ['isLocked' => $reply->discussion->is_locked, 'showComments' => $showComments, 'model' => $reply, 'comments' => $comments, 'comment' => $comment])
    </div>

    <!-- Reply likes modal -->
    <div id="reply-likes-modal-{{ $reply->id }}" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" id="hide-reply-likes-modal-{{ $reply->id }}">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <livewire:layout.dialogs.likes :model="$reply" />
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script>
        window.addEventListener('replyCommentSelected', event => {
            window.openModal('comment-likes-modal-' + event.detail.id);
        });
    </script>
@endpush
