@php
    $routePrefix = (auth()->user()->id == $user->id ? 'profile' : 'user');
    $routeParams = [];
    if ($routePrefix == 'user') {
        $routeParams['user'] = $user;
        $routeParams['slug'] = Str::slug($user->name);
    }
@endphp
<div class="w-full flex flex-wrap">
    <a href="{{ route($routePrefix . '.discussions', $routeParams) }}" class="lg:w-1/4 w-1/2 p-3">
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

    <a href="{{ route($routePrefix . '.replies', $routeParams) }}" class="lg:w-1/4 w-1/2 p-3">
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

    <a href="{{ route($routePrefix . '.comments', $routeParams) }}" class="lg:w-1/4 w-1/2 p-3">
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

    <a href="{{ route($routePrefix . '.likes', $routeParams) }}" class="lg:w-1/4 w-1/2 p-3">
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

    @if(auth()->user()->id == $user->id)
        <a href="{{ route($routePrefix . '.following-discussions', $routeParams) }}" class="lg:w-1/3 w-full p-3">
            <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-green-100 text-green-500 rounded-full">
                <i class="fa-solid fa-star"></i>
            </span>
                <div class="flex flex-col gap-0">
                    <span class="text-slate-500 text-sm">Total following discussions</span>
                    <span class="text-slate-700 text-lg font-medium">{{ $followingDiscussions }}</span>
                </div>
            </div>
        </a>

        <a href="{{ route($routePrefix . '.not-following-discussions', $routeParams) }}" class="lg:w-1/3 w-full p-3">
            <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-orange-100 text-orange-500 rounded-full">
                <i class="fa-regular fa-star"></i>
            </span>
                <div class="flex flex-col gap-0">
                    <span class="text-slate-500 text-sm">Total Not following discussions</span>
                    <span class="text-slate-700 text-lg font-medium">{{ $notFollowingDiscussions }}</span>
                </div>
            </div>
        </a>

        <a href="{{ route($routePrefix . '.ignoring-discussions', $routeParams) }}" class="lg:w-1/3 w-full p-3">
            <div class="w-full rounded-lg hover:shadow border border-slate-200 bg-white flex justify-start items-center gap-5 p-5">
            <span class="w-12 h-12 flex justify-center items-center text-center bg-red-100 text-red-500 rounded-full">
                <i class="fa-regular fa-eye-slash"></i>
            </span>
                <div class="flex flex-col gap-0">
                    <span class="text-slate-500 text-sm">Total ignoring discussions</span>
                    <span class="text-slate-700 text-lg font-medium">{{ $ignoringDiscussions }}</span>
                </div>
            </div>
        </a>
    @endif

</div>
