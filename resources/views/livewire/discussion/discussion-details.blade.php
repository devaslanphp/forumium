<div class="flex flex-row gap-5 w-full border-b border-slate-200 pb-5 mb-5">
    <img src="{{ $discussion->user->avatarUrl }}" alt="Avatar" class="rounded-full w-16 h-16" />
    <div class="w-full flex flex-col">
        <span class="text-slate-700 font-medium">{{ $discussion->user->name }}</span>
        <span class="text-slate-500 text-sm mt-1">{{ $discussion->created_at->diffForHumans() }}</span>
        <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
            {!! $discussion->content !!}
        </div>
        <div class="w-full flex items-center gap-5 text-slate-500 text-xs mt-5">
            <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                <i class="fa-regular fa-thumbs-up"></i> {{ $likes }} {{ $likes > 1 ? 'Likes' : 'Like' }}
            </button>
            <button type="button" class="flex items-center gap-2 hover:cursor-pointer">
                <i class="fa-regular fa-comment"></i> {{ $comments }} {{ $comments > 1 ? 'Comments' : 'Comment' }}
            </button>
        </div>
    </div>
</div>
