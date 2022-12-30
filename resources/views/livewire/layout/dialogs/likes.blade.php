<div class="px-6 py-6 lg:px-8 overflow-auto max-h-[90vh]">
    <h3 class="mb-8 text-xl font-medium text-slate-900 dark:text-white">Likes @if($likes->count()) ({{ $likes->count() }}) @endif</h3>
    <div class="w-full flex flex-col">
        @if($likes->count())
            @foreach($likes as $like)
                <div class="w-full flex items-center gap-2 py-3 @if(!$loop->last) border-b border-slate-200 @endif">
                    <img src="{{ $like->user->avatarUrl }}" alt="Avatar"
                         class="rounded-full w-10 h-10 border border-slate-200 shadow"/>
                    <div class="flex flex-col gap-0">
                        <a href="{{ route('user.index', ['user' => $like->user, 'slug' => Str::slug($like->user->name)]) }}" class="hover:cursor-pointer hover:underline text-slate-700 font-medium">{{ $like->user->name }}</a>
                        <span class="text-slate-500 text-sm">Liked {{ $like->created_at->diffForHumans() }}</span>
                    </div>
                </div>
            @endforeach
        @else
            <span class="text-slate-700 font-medium text-sm">
            No likes available yet!
        </span>
        @endif
    </div>
</div>
