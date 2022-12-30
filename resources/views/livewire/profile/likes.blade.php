<div class="w-full flex flex-col">
    <div class="text-slate-700 text-lg flex items-center gap-2">
        @if(auth()->user()->id == $user->id)
            Your likes
        @else
            Likes
        @endif
        <div wire:loading><i class="fa fa-spinner fa-spin"></i></div>
    </div>
    <div class="w-full flex lg:flex-row flex-wrap flex-col">
        @if($likes->count())
            @foreach($likes as $like)
                @php
                    $params = [
                        'l' => $like->id
                    ];
                    $type = 'Discussion';
                    if ($like->source_type == \App\Models\Discussion::class) {
                        $discussion = $like->source;
                        $params['d'] = $like->source_id;
                    } elseif ($like->source_type == \App\Models\Reply::class) {
                        $discussion = $like->source->discussion;
                        $params['r'] = $like->source_id;
                        $type = 'Reply';
                    } elseif ($like->source_type == \App\Models\Comment::class) {
                        $params['c'] = $like->source_id;
                        $source = $like->source;
                        $type = 'Comment';
                        if ($source->source_type == \App\Models\Discussion::class) {
                            $discussion = $source->source;
                            $params['d'] = $source->source_id;
                        } elseif ($source->source_type == \App\Models\Reply::class) {
                            $discussion = $source->source->discussion;
                            $params['r'] = $source->source_id;
                        }
                    }
                    $params['discussion'] = $discussion;
                    $params['slug'] = Str::slug($discussion->name);
                @endphp
                <a href="{{ route('discussion', $params) }}"
                   class="lg:w-1/2 w-full flex lg:flex-row flex-col lg:gap-0 gap-3 items-start justify-between hover:bg-slate-100 hover:cursor-pointer hover:rounded transition-all">
                    <div class="w-full flex gap-3 border-slate-200 py-5 border-b mx-3">
                        <img src="{{ $discussion->user->avatarUrl }}" alt="Avatar"
                             class="rounded-full w-10 h-10"/>
                        <div class="flex flex-col gap-1">
                            <div class="flex items-center gap-1">
                                <span class="font-medium text-slate-500">
                                    <span class="font-medium text-slate-400">
                                        @if($type == 'Discussion')
                                            You liked the <span class="bg-slate-100 text-blue-500 px-2 py-1 text-xs rounded">discussion</span>
                                        @elseif($type == 'Reply')
                                            You liked a <span class="bg-slate-100 text-purple-500 px-2 py-1 text-xs rounded">reply</span> in
                                        @else
                                            You liked a <span class="bg-slate-100 text-green-500 px-2 py-1 text-xs rounded">comment</span> in
                                        @endif
                                    </span>
                                    @if($discussion->is_resolved)
                                        <span class="font-normal">[Resolved]</span>
                                    @endif
                                    {{ $discussion->name }}
                                </span>
                            </div>
                            <span class="text-slate-400 text-sm">
                                Liked {{ $like->created_at->diffForHumans() }}
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        @else
            <span class="py-3 text-slate-700 font-medium text-sm">
                You haven't liked any discussions, replies or comments yet.
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
