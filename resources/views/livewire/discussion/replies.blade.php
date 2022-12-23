<div class="w-full flex flex-col">
    @if($discussion->replies->count())
        @foreach($discussion->replies as $reply)
            @livewire('discussion.reply-details', compact('reply'))
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
