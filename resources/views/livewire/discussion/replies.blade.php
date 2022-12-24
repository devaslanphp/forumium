<div class="w-full flex flex-col">
    <div class="w-full flex flex-col" id="replies">
        @foreach($replies as $reply)
            <livewire:discussion.reply-details :reply="$reply" :key="time() . 'reply' . $reply->id" />
        @endforeach
    </div>
    @if(!$replies->count())
        <span class="px-3 text-slate-700 font-medium text-sm pb-5 mb-5 border-b border-slate-200">
            No replies posted for now! Please come back later, or add a new reply.
        </span>
    @endif
    @if(
        (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
        (
            auth()->user()->id === $discussion->user_id
            || auth()->user()->can(Permissions::REPLY_TO_DISCUSSIONS->value)
        )
    )
        <button wire:ignore type="button" data-modal-toggle="add-reply-modal" class="w-full bg-transparent hover:cursor-pointer px-3 py-10 border-2 border-transparent border-dashed hover:border-slate-200 rounded text-slate-500 hover:text-slate-700 font-medium text-left">
            Write a reply...
        </button>
    @endif
</div>
