<div class="container mx-auto flex items-center flex-wrap">
    @if($tags->count())
        @foreach($tags as $tag)
            <a href="{{ route('tag', ['tag' => $tag, 'slug' => Str::slug($tag->name)]) }}" class="lg:w-1/3 w-full p-6 text-white hover:shadow-xl shadow-slate-900 hover:scale-105 transition-all hover:rounded-xl" style="background-color: {{ $tag->color }};">
                <div class="w-full flex items-center gap-2 mb-5">
                    <i class="{{ $tag->icon }} mb-2 text-lg text-white"></i>
                    <h5 class="mb-2 text-2xl font-normal w-full">{{ $tag->name }}</h5>
                </div>
                <div class="w-full h-[100px] text-sm font-light">
                    {!! nl2br(e($tag->description)) !!}
                </div>
                <div class="w-full mb-2" style="height: 1px; background-color: rgba(0,0,0,.15);"></div>
                <span class="flex justify-between items-center gap-2 items-center text-xs">
                    @php($discussions = $tag->discussions()->count())
                    <span>View discussions @if($discussions) ({{ $discussions }}) @endif</span> <i class="fa-solid fa-arrow-right-long"></i>
                </span>
            </a>
        @endforeach
    @else
        <div class="w-full flex flex-col justify-center items-center text-center gap-2 py-20">
            <i class="fa-regular fa-face-frown-open fa-2x mb-5"></i>
            <span class="px-3 text-slate-700 font-medium text-sm">
                No tags available for now! Please come back later.
            </span>
            <a href="{{ route('home') }}" class="flex items-center gap-1 text-sm text-blue-500 hover:text-blue-600 px-3">
                <i class="fa-solid fa-arrow-left"></i> Back to home
            </a>
        </div>
    @endif
</div>
