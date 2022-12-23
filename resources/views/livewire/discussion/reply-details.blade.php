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
                || auth()->user()->can(Permissions::DELETE_POSTS->value)
            )
                <button wire:click="delete()" type="button" class="flex items-center gap-2 hover:cursor-pointer text-red-500 hover:underline hover-action">
                    Delete
                </button>
            @endif
        </div>
    </div>
</div>
