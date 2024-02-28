@php
    $type = $type ?? null;
    if (!$type) {
        if (auth()->check()) {
            $type =
                $discussion
                    ->followers()
                    ->where('user_id', auth()->user()->id)
                    ->first()?->pivot?->type ?? Followers::NONE->value;
        } else {
            $type = Followers::NONE->value;
        }
    }
@endphp
<!-- Item -->
<a href="{{ route('discussion', ['discussion' => $discussion, 'slug' => Str::slug($discussion->name)]) }}">
    <div class="container rounded-lg duration-300 mx-auto flex flex-wrap mt-4 mb-3 hover:shadow-lg border-2">
        <div
            class="bg-[#f8d48195] border-b rounded-t-lg py-2 px-4 md:py-2 md:px-5 dark:bg-slate-900 dark:border-gray-700 w-full">
            <p class="mt-1 text-sm text-black font-bold">
                Pinned
            </p>
        </div>
        <div class="w-full  px-4 py-4 overflow-hidden bg-white rounded-lg">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img class="hidden object-cover w-10 h-10 rounded-full sm:block"
                        src="{{ $discussion->user->avatarUrl }}" alt="avatar" />
                    <p class="font-bold text-gray-700 cursor-pointer dark:text-gray-200">
                        {{ $discussion->user->name }}
                    </p>
                </div>
            </div>
            <div class="mt-2">
                <p class="text-xl font-bold text-gray-700 ">
                    {{ $discussion->name }}
                </p>
                <p class="mt-2 text-gray-600 dark:text-gray-300">
                    {{ Str::limit(strip_tags($discussion->content), 200) }}
                </p>
            </div>
            <div class="flex items-center mt-4">
                <div class="flex items-center gap-3 lg:order-2 order-1">
                    <span class="text-sm text-slate-500 flex items-center gap-1">
                        <i class="fa-regular fa-thumbs-up"></i> {{ $discussion->likes()->count() }}
                    </span>
                    <span class="text-sm text-slate-500 flex items-center gap-1">
                        <i class="fa-regular fa-comment"></i> {{ $discussion->replies()->count() }}
                    </span>
                </div>
            </div>
        </div>
    </div>
</a>
{{-- <a href="{{ route('discussion', ['discussion' => $discussion, 'slug' => Str::slug($discussion->name)]) }}"
   class="w-full flex lg:flex-row flex-col lg:gap-0 gap-3 items-start justify-between hover:bg-slate-100 hover:cursor-pointer px-3 hover:rounded transition-all border-slate-200 py-5 {{ $loop->last ? '' : 'border-b' }}">
    <div class="flex gap-3">
        <img src="{{ $discussion->user->avatarUrl }}" alt="Avatar"
             class="rounded-full w-10 h-10 border border-slate-200 shadow"/>
        <div class="flex flex-col gap-1">
            <div class="flex items-center gap-1">
                @if ($discussion->is_locked)
                    <i class="fa-solid fa-lock text-slate-400"></i>
                @endif
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
                    @if ($discussion->is_resolved)
                        <span class="font-normal">[Resolved]</span>
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
            <div class="flex items-center mt-2">
                @include('partials.discussions.tags', ['tags' => $discussion->tags, 'ignore_first' => true])
            </div>
        </div>
    </div>
    <div class="flex flex-row items-center gap-3 lg:pl-0 pl-14">
        <div class="flex items-center gap-3 lg:order-2 order-1">
            <span class="text-sm text-slate-500 flex items-center gap-1">
                <i class="fa-regular fa-thumbs-up"></i> {{ $discussion->likes()->count() }}
            </span>
            <span class="text-sm text-slate-500 flex items-center gap-1">
                <i class="fa-regular fa-comment"></i> {{ $discussion->replies()->count() }}
            </span>
        </div>
    </div>
</a> --}}
