<div class="w-full flex flex-col">
    <div class="text-slate-700 text-lg flex items-center gap-2">
        @if(auth()->user()->id == $user->id)
            Your discussions
        @else
            Discussions
        @endif
        <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
    </div>
    <div class="w-full flex flex-col">
        @if($discussions->count())
            @foreach($discussions as $discussion)
                @php
                    if(auth()->check()) {
                        $type = $discussion->followers()->where('user_id', auth()->user()->id)->first()?->pivot?->type ?? Followers::NONE->value;
                    } else {
                        $type = Followers::NONE->value;
                    }
                @endphp
                @include('partials.layouts.discussion-item', compact('discussion'))
            @endforeach
        @else
            <span class="py-3 text-slate-700 font-medium text-sm">
                You haven't started a discussion yet. You can start a new discussion from <a href="{{ route('home') }}" class="text-blue-500 hover:underline hover:text-blue-600">home page</a>
            </span>
        @endif
    </div>
    @if(!$disableLoadMore)
        <div class="w-full flex justify-center items-center text-center mt-5">
            <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                    class="bg-slate-100 disabled:bg-slate-50 px-3 py-2 text-slate-500 border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Load more
            </button>
        </div>
    @endif
</div>
