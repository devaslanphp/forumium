<div class="w-full flex flex-col gap-5">
    <a href="{{ route('profile.discussions') }}" class="w-full flex items-center {{ Route::is('profile.discussions') ? 'text-blue-500' : 'hover:text-blue-500 text-slate-500' }}">
        <span class="w-[30px]"><i class="fa-solid fa-bars"></i></span>
        <span>Discussions</span>
    </a>
    <a href="{{ route('profile.replies') }}" class="w-full flex items-center {{ Route::is('profile.replies') ? 'text-blue-500' : 'hover:text-blue-500 text-slate-500' }}">
        <span class="w-[30px]"><i class="fa-regular fa-comment"></i></span>
        <span>Replies</span>
    </a>
    <a href="{{ route('profile.likes') }}" class="w-full flex items-center {{ Route::is('profile.likes') ? 'text-blue-500' : 'hover:text-blue-500 text-slate-500' }}">
        <span class="w-[30px]"><i class="fa-regular fa-thumbs-up"></i></span>
        <span>Likes</span>
    </a>
    <a href="{{ route('profile.settings') }}" class="w-full flex items-center {{ Route::is('profile.settings') ? 'text-blue-500' : 'hover:text-blue-500 text-slate-500' }} mt-5">
        <span class="w-[30px]"><i class="fa-solid fa-cog"></i></span>
        <span>Settings</span>
    </a>
</div>
