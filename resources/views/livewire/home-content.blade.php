<select
    class="bg-slate-100 px-3 py-2 mx-3 border-slate-100 hover:bg-slate-200 text-slate-500 rounded hover:cursor-pointer w-fit">
    <option>Latest</option>
    <option>Top</option>
    <option>Newset</option>
    <option>Oldest</option>
    <option>Trending</option>
    <option>Upvotes</option>
    <option>Most backed</option>
</select>
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
            <!-- Item -->
            <a href="{{ route('discussion', ['discussion' => $discussion, 'slug' => Str::slug($discussion->name)]) }}"
               class="w-full flex lg:flex-row flex-col lg:gap-0 gap-3 items-start justify-between hover:bg-slate-100 hover:cursor-pointer px-3 hover:rounded transition-all border-slate-200 py-5 {{ $loop->last ? '' : 'border-b' }}">
                <div class="flex gap-3">
                    <img src="{{ $discussion->user->avatarUrl }}" alt="Avatar"
                         class="rounded-full w-10 h-10"/>
                    <div class="flex flex-col gap-1">
                        <div class="flex items-center gap-1">
                            @switch($type)
                                @case(Followers::FOLLOWING->value)
                                    <i class="fa-solid fa-star text-green-500" title="Following"></i>
                                    @break
                                @case(Followers::NOT_FOLLOWING->value)
                                    <i class="fa-regular fa-star text-orange-500" title="Not following"></i>
                                    @break
                                @case(Followers::IGNORING->value)
                                    <i class="fa-regular fa-eye-slash text-red-500" title="Ignoring"></i>
                                    @break
                            @endswitch
                            <span class="font-medium text-slate-500">
                                @if($discussion->is_resolved)
                                    <span class="font-bold">[Resolved]</span>
                                @endif
                                {{ $discussion->name }}
                            </span>
                        </div>
                        <span class="text-slate-400 text-sm">
                            Created by <span class="font-medium">{{ $discussion->user->name }}</span> (<span class="text-xs">{{ $discussion->created_at->diffForHumans() }}</span>)
                        </span>
                        <span class="text-slate-400 font-light lg:max-w-[90%] max-w-full text-sm">
                            {{ Str::limit(strip_tags($discussion->content), 200) }}
                        </span>
                    </div>
                </div>
                <div class="flex flex-row items-center gap-3">
                    <div class="flex items-center">
                        @include('partials.discussions.tags', ['tags' => $discussion->tags, 'ignore_first' => true])
                    </div>
                    <span class="text-sm text-slate-500 flex items-center gap-1">
                        <i class="fa-regular fa-thumbs-up"></i> {{ $discussion->likes()->count() }}
                    </span>
                    <span class="text-sm text-slate-500 flex items-center gap-1">
                        <i class="fa-regular fa-comment"></i> {{ $discussion->replies()->count() + $discussion->comments()->count() }}
                    </span>
                </div>
            </a>
        @endforeach
    @else
        <span class="px-3 text-slate-700 font-medium text-sm">
            No discussions available for now! Please come back later, or start a new discussion.
        </span>
    @endif
</div>
<!--
    <div class="w-full flex justify-center items-center text-center">
        <button type="button"
                class="bg-slate-100 px-3 py-2 text-slate-500 border-slate-100 rounded hover:cursor-pointer w-fit hover:bg-slate-200">
            Load more
        </button>
    </div>
-->
