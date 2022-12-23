<div class="w-full flex flex-col">
    @if($discussion->replies->count())
        @foreach($discussion->replies as $reply)
            <div class="flex flex-row gap-5 w-full border-b border-slate-200 pb-5 mb-5">
                <img src="{{ $reply->user->avatarUrl }}" alt="Avatar" class="rounded-full w-16 h-16" />
                <div class="w-full flex flex-col">
                    <span class="text-slate-700 font-medium">{{ $reply->user->name }}</span>
                    <span class="text-slate-500 text-sm mt-1" wire:poll.5000ms>{{ $reply->created_at->diffForHumans() }}</span>
                    <div class="w-full max-w-full prose mt-3 lg:pr-5 pr-0">
                        {!! $reply->content !!}
                    </div>
                </div>
            </div>
        @endforeach
        <button type="button" data-modal-toggle="add-reply-modal" class="w-full bg-transparent hover:cursor-pointer px-3 py-10 border-2 border-transparent border-dashed hover:border-slate-200 rounded text-slate-500 hover:text-slate-700 font-medium text-left">
            Write a reply...
        </button>
    @else
        <span class="px-3 text-slate-700 font-medium text-sm pb-5 mb-5 border-b border-slate-200">
            No replies posted for now! Please come back later, or add a new reply.
        </span>
    @endif
</div>
