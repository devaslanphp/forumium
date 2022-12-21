<div class="w-full flex flex-col gap-5">
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-regular fa-comment"></i></span>
        <span>Posts</span>
    </a>
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-solid fa-bars"></i></span>
        <span>Discussions</span>
    </a>
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-regular fa-thumbs-up"></i></span>
        <span>Likes</span>
    </a>
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-solid fa-angles-up"></i></span>
        <span>Votes</span>
    </a>
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-solid fa-at"></i></span>
        <span>Mentions</span>
    </a>
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-solid fa-user-slash"></i></span>
        <span>Ignored users</span>
    </a>
    <a href="{{ route('settings') }}" class="w-full flex items-center {{ Route::is('settings') ? 'text-blue-500' : 'hover:text-blue-500 text-slate-500' }} mt-5">
        <span class="w-[30px]"><i class="fa-solid fa-cog"></i></span>
        <span>Settings</span>
    </a>
</div>
