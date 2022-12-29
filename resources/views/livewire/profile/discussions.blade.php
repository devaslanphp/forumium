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
                @include('partials.layouts.discussion-item', [
                    'discussion' => $discussion,
                    'type' => $follow
                ])
            @endforeach
        @else
            <span class="py-3 text-slate-700 font-medium text-sm">
                You haven't started a discussion yet. You can start a new discussion from <a href="{{ route('home') }}" class="text-blue-500 hover:underline hover:text-blue-600">home page</a>
            </span>
        @endif
    </div>
    <div class="w-full flex flex-col justify-center items-center text-center mt-5 gap-2">
        @if(!$disableLoadMore)
            <button type="button" wire:click="loadMore" wire:loading.attr="disabled"
                    class="bg-slate-100 disabled:bg-slate-50 px-3 py-2 text-slate-500 border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
                Load more
            </button>
        @endif
        @if($totalCount)
            <span class="text-xs text-slate-600">
                Showing {{ min($limitPerPage, $totalCount) }} of {{ $totalCount }} {{ $totalCount > 1 ? 'discussions' : 'discussion' }}
            </span>
        @endif
    </div>
</div>
