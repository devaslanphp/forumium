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
        <i class="lg:flex hidden fa-regular fa-comments"></i> {{ $replies }} {{ $replies > 1 ? 'replies' : 'reply' }} / {{ $comments }} {{ $comments > 1 ? 'comments' : 'comment' }}
    </span>
</div>
