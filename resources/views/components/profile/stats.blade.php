<div class="w-full flex flex-wrap">
    <a @if($user->id == auth()->user()->id) href="{{ route('profile.discussions') }}" @endif class="lg:w-1/4 w-full p-3">
        <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-orange-100 text-orange-500 rounded-full">
                <i class="fa-solid fa-bars"></i>
            </span>
            <div class="flex flex-col gap-0">
                <span class="text-slate-500 text-sm">Total discussions</span>
                <span class="text-slate-700 text-lg font-medium">{{ $discussions }}</span>
            </div>
        </div>
    </a>

    <a @if($user->id == auth()->user()->id) href="{{ route('profile.replies') }}" @endif class="lg:w-1/4 w-full p-3">
        <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-blue-100 text-blue-500 rounded-full">
                <i class="fa-regular fa-comment"></i>
            </span>
            <div class="flex flex-col gap-0">
                <span class="text-slate-500 text-sm">Total replies</span>
                <span class="text-slate-700 text-lg font-medium">{{ $replies }}</span>
            </div>
        </div>
    </a>

    <a @if($user->id == auth()->user()->id) href="{{ route('profile.comments') }}" @endif class="lg:w-1/4 w-full p-3">
        <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-purple-100 text-purple-500 rounded-full">
                <i class="fa-regular fa-comments"></i>
            </span>
            <div class="flex flex-col gap-0">
                <span class="text-slate-500 text-sm">Total comments</span>
                <span class="text-slate-700 text-lg font-medium">{{ $comments }}</span>
            </div>
        </div>
    </a>

    <a @if($user->id == auth()->user()->id) href="{{ route('profile.likes') }}" @endif class="lg:w-1/4 w-full p-3">
        <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-green-100 text-green-500 rounded-full">
                <i class="fa-regular fa-thumbs-up"></i>
            </span>
            <div class="flex flex-col gap-0">
                <span class="text-slate-500 text-sm">Total likes</span>
                <span class="text-slate-700 text-lg font-medium">{{ $likes }}</span>
            </div>
        </div>
    </a>
</div>
