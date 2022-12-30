<div class="w-full flex flex-col">
    <div class="w-full flex lg:flex-row flex-col lg:justify-between justify-start lg:items-center items-start gap-1">
        @php($repliesCount = $discussion->replies()->count())
        @php($bestRepliesCount = $discussion->replies()->where('is_best', true)->count())
        @if($repliesCount)
            <div class="w-full flex gap-2 items-center mb-10">
                <span class="text-slate-700 text-lg">
                    {{ $repliesCount }} {{ $repliesCount > 1 ? 'Replies' : 'Reply' }}
                </span>
                @if($onlyBestEnabled)
                    <span class="text-slate-500 text-sm">
                        ({{ $bestRepliesCount }} {{ $bestRepliesCount > 1 ? 'Best replies' : 'Best reply' }})
                    </span>
                @endif
            </div>
        @endif
        @if($onlyBestEnabled)
            <button type="button" wire:click="toggleOnlyBest()" class="flex justify-center items-center text-center gap-1 min-w-[180px] w-fit border bg-transparent {{ $onlyBest ? 'border-slate-500 hover:border-slate-600 text-slate-500 hover:text-slate-600' : 'border-green-500 hover:border-green-600 text-green-500 hover:text-green-600' }} hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg font-medium text-center text-xs">
                <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
                <div wire:loading.remove>
                    <i class="fa-solid fa-filter"></i>
                </div>
                {{ $onlyBest ? 'Show all replies' : 'Show only best replies' }}
            </button>
        @endif
    </div>
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
        ) && !$discussion->is_locked
    )
        <button wire:ignore type="button" data-modal-toggle="add-reply-modal" class="mt-5 w-full bg-transparent hover:cursor-pointer px-3 py-10 border-2 border-transparent border-dashed hover:border-slate-200 rounded text-slate-500 hover:text-slate-700 font-medium text-left">
            Write a reply...
        </button>
    @endif
    @if(!$disableLoadMore)
        <div class="w-full flex justify-center items-center text-center mt-5">
            <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                    class="bg-slate-100 disabled:bg-slate-50 px-3 py-2 text-slate-500 border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Load more
            </button>
        </div>
    @endif
</div>
