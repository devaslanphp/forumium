<div class="w-full h-52 flex flex-row justify-center items-center lg:px-0 px-6" style="background-color: {{ $discussion->tags->first()->color }}CC">
    <div class="container flex flex-row justify-start items-center gap-5">
        <div class="flex flex-col justify-center items-start gap-3">
            <div class="flex flex-col gap-2">
                <span class="text-xl font-medium text-white text-shadow-lg">
                    @if($discussion->is_locked)
                        <i class="fa-solid fa-lock"></i>
                    @endif
                    <span class="font-normal">{{ $isResolved ? '[Resolved]' : '' }}</span>
                    {{ $discussion->name }}
                </span>
                @include('partials.discussions.tags', ['tags' => $discussion->tags])
            </div>
            <div class="w-full lg:flex lg:flex-row grid grid-cols-2 justify-start items-center lg:gap-5 gap-2 text-white text-xs text-shadow">
                <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                    <i class="fa-regular fa-clock"></i> {{ $discussion->updated_at->diffForHumans() }}
                </span>
                <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                    <i class="fa-regular fa-message"></i> Created {{ $discussion->created_at->diffForHumans() }}
                </span>
                @if($isResolved)
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-solid fa-check"></i> Resolved
                    </span>
                @endif
                <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                    <i class="fa-regular fa-comments"></i> {{ $replies }} {{ $replies > 1 ? 'replies' : 'reply' }} / {{ $comments }} {{ $comments > 1 ? 'comments' : 'comment' }}
                </span>
                @if($isPublic)
                    <span class="lg:flex lg:flex-row block justify-center lg:items-center items-start gap-2">
                        <i class="fa-solid fa-globe"></i> Public discussion
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
