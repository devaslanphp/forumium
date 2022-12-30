<div class="flex flex-row gap-5 w-full border-b border-slate-200 pb-5 mb-5" id="discussion">
    <a @if(auth()->user() && auth()->user()->hasVerifiedEmail()) href="{{ route('user.index', ['user' => $discussion->user, 'slug' => Str::slug($discussion->user->name)]) }}" @else data-modal-toggle="login-modal" @endif class="hover:cursor-pointer">
        <div class="bg-cover bg-center rounded-full w-16 h-16 border border-slate-200 shadow" style="background-image: url({{ $discussion->user->avatarUrl }})"></div>
    </a>
    <div class="w-full flex flex-col">
        <div class="w-full flex items-center justify-between gap-2">
            <div class="flex flex-col">
                <a @if(auth()->user() && auth()->user()->hasVerifiedEmail()) href="{{ route('user.index', ['user' => $discussion->user, 'slug' => Str::slug($discussion->user->name)]) }}" @else data-modal-toggle="login-modal" @endif class="hover:cursor-pointer hover:underline text-slate-700 font-medium">{{ $discussion->user->name }}</a>
                <span class="text-slate-500 text-sm mt-1">{{ $discussion->created_at->diffForHumans() }}</span>
            </div>
            <livewire:discussion.mark-as-resolved :discussion="$discussion" />
        </div>
        @if($edit)
            <livewire:layout.dialogs.discussion :discussion="$discussion" />
        @else
            <div class="w-full flex flex-col gap-5 hovered-section">
                <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
                    {!! $discussion->content !!}
                </div>
                <div class="w-full flex items-center gap-5 text-slate-500 text-xs">
                    @if(
                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                            (
                                auth()->user()->id === $discussion->user_id
                                || auth()->user()->can(Permissions::LIKE_POSTS->value)
                            )
                        )
                        <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                            <i class="fa-regular fa-thumbs-up" wire:click="toggleLike()"></i>
                            <span onclick="window.openModal('discussion-likes-modal')">{{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}</span>
                        </button>
                    @else
                        <div class="flex items-center gap-2">
                            <i class="fa-regular fa-thumbs-up"></i> {{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}
                        </div>
                    @endif
                    <button wire:click="toggleComments()" type="button" class="flex items-center gap-2 hover:cursor-pointer toggle-comments">
                        <i class="fa-regular fa-comment"></i> {{ $comments }} {{ $comments > 1 ? 'Comments' : 'Comment' }}
                    </button>
                    @if(
                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                            (
                                auth()->user()->id === $discussion->user_id
                                || auth()->user()->can(Permissions::EDIT_POSTS->value)
                            )
                        )
                        <button wire:click="editDiscussion()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-blue-500 hover:underline hover-action">
                            Edit
                        </button>
                    @endif
                    @if(
                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                            (
                                auth()->user()->id === $discussion->user_id
                                || auth()->user()->can(Permissions::DELETE_POSTS->value)
                            )
                        )
                        <button wire:click="deleteDiscussion()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-red-500 hover:underline hover-action">
                            Delete
                        </button>
                    @endif
                    <div wire:loading>
                        <i class="fa fa-spinner fa-spin"></i>
                    </div>
                </div>
            </div>
            @if($showComments)
                <div class="w-full flex flex-col gap-2 mt-5">
                    <span class="text-slate-700 text-lg">
                        {{ $comments }} {{ $comments > 1 ? 'Comments' : 'Comment' }}
                    </span>
                    <div class="w-full flex flex-col gap-0 bg-slate-50 border-y border-slate-100">
                        @if($discussion->comments->count())
                            @foreach($discussion->comments as $c)
                                <div class="w-full flex flex-col py-5 px-3 gap-2 {{ $loop->last ? '' : 'border-b border-slate-200' }} hovered-section" id="comment-{{ $c->id }}">
                                    <div class="w-full text-slate-700 text-sm">
                                        <a @if(auth()->user() && auth()->user()->hasVerifiedEmail()) href="{{ route('user.index', ['user' => $c->user, 'slug' => Str::slug($c->user->name)]) }}" @else data-modal-toggle="login-modal" @endif class="hover:cursor-pointer hover:underline font-medium">{{ $c->user->name }}</a> (<span class="text-xs">{{ $c->created_at->diffForHumans() }}</span>) - <span>{{ nl2br(e($c->content)) }}</span>
                                    </div>
                                    <div class="w-full flex items-center gap-5 text-slate-500 text-xs">
                                        @if(
                                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                                            (
                                                auth()->user()->id === $c->user_id
                                                || auth()->user()->can(Permissions::LIKE_POSTS->value)
                                            )
                                        )
                                            <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                                                <i class="fa-regular fa-thumbs-up" wire:click="toggleCommentLike({{ $c->id }})"></i>
                                                <span wire:click="selectComment({{ $c->id }})">{{ $c->likes->count() }} {{ $c->likes->count() > 1 ? 'Likes' : 'Like' }}</span>
                                            </button>
                                        @else
                                            <div class="flex items-center gap-2">
                                                <i class="fa-regular fa-thumbs-up"></i> {{ $c->likes->count() }} {{ $c->likes->count() > 1 ? 'Likes' : 'Like' }}
                                            </div>
                                        @endif
                                        @if(
                                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                                            (
                                                auth()->user()->id === $c->user_id
                                                || auth()->user()->can(Permissions::EDIT_POSTS->value)
                                            ) && (
                                                !$comment
                                            )
                                        )
                                            <button wire:click="editComment({{ $c->id }})" type="button" class="flex items-center gap-2 hover:cursor-pointer text-blue-500 hover:underline hover-action">
                                                Edit
                                            </button>
                                        @endif
                                        @if(
                                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                                            (
                                                auth()->user()->id === $c->user_id
                                                || auth()->user()->can(Permissions::DELETE_POSTS->value)
                                            ) && (
                                                !$comment
                                            )
                                        )
                                            <button wire:click="deleteComment({{ $c->id }})" type="button" class="flex items-center gap-2 hover:cursor-pointer text-red-500 hover:underline hover-action">
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <span class="text-slate-700 font-medium text-sm py-5 px-3">
                            No comments yet! Please come back later, or add a new comment.
                        </span>
                        @endif
                    </div>
                    @if($comment)
                        <form wire:submit.prevent="saveComment">
                            {{ $this->form }}
                            <!-- Modal footer -->
                            <div class="flex items-center space-x-2 rounded-b mt-2">
                                <button type="submit" wire:loading.attr="disabled" class="text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                    Save comment
                                </button>
                                <button type="button" wire:click="cancelComment()" wire:loading.attr="disabled" class="text-white bg-slate-700 disabled:bg-slate-300 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    @else
                        @if(
                            (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                            (
                                auth()->user()->id === $discussion->user_id
                                || auth()->user()->can(Permissions::COMMENT_POSTS->value)
                            )
                        )
                            <button wire:click="addComment()" type="button" class="bg-slate-100 px-3 py-2 text-slate-500 text-sm border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                                Add comment
                            </button>
                        @endif
                    @endif
                </div>
            @endif
        @endif
    </div>

    <!-- Discussion likes modal -->
    <div id="discussion-likes-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" id="hide-discussion-likes-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <livewire:layout.dialogs.likes :model="$discussion" />
            </div>
        </div>
    </div>

    <!-- Comment likes modal -->
    <div id="discussion-comment-likes-modal" tabindex="-1" aria-hidden="true" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
        <div class="relative w-full h-full max-w-md md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                <button type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" id="hide-discussion-comment-likes-modal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                @if($selectedComment)
                    <livewire:layout.dialogs.likes :model="$selectedComment" />
                @endif
            </div>
        </div>
    </div>

</div>

@push('scripts')
    <script>
        window.addEventListener('discussionCommentSelected', function () {
            window.openModal('discussion-comment-likes-modal');
        });
    </script>
@endpush
