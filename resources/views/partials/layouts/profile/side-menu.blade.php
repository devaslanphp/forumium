<div class="w-full flex lg:flex-col flex-row lg:overflow-hidden overflow-auto">
    <a href="{{ route('profile.index') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-r-0 border-r border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.index') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }}">
        <span class="w-[30px]"><i class="fa-regular fa-user"></i></span>
        <span>My profile</span>
    </a>

    <a href="{{ route('profile.discussions') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-x-0 border-x border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.discussions') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }} lg:mt-5 mt-0">
        <span class="w-[30px]"><i class="fa-solid fa-bars"></i></span>
        <span>Discussions</span>
    </a>
    <a href="{{ route('profile.replies') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-r-0 border-r border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.replies') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }}">
        <span class="w-[30px]"><i class="fa-regular fa-comment"></i></span>
        <span>Replies</span>
    </a>
    <a href="{{ route('profile.comments') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-r-0 border-r border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.comments') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }}">
        <span class="w-[30px]"><i class="fa-regular fa-comments"></i></span>
        <span>Comments</span>
    </a>
    <a href="{{ route('profile.likes') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-r-0 border-r border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.likes') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }}">
        <span class="w-[30px]"><i class="fa-regular fa-thumbs-up"></i></span>
        <span>Likes</span>
    </a>

    <a href="{{ route('profile.settings') }}" class="lg:min-w-full min-w-[150px] lg:w-full w-fit lg:p-0 p-3 lg:bg-transparent lg:mb-5 mb-0 lg:border-y-0 border-y lg:border-r-0 border-r border-slate-200 flex lg:justify-start justify-center lg:text-left text-center items-center {{ Route::is('profile.settings') ? 'lg:text-blue-500 lg:bg-transparent text-white bg-blue-500' : 'lg:hover:text-blue-500 lg:text-slate-500 lg:hover:bg-transparent hover:bg-blue-500 hover:text-white' }} lg:mt-5 mt-0">
        <span class="w-[30px]"><i class="fa-solid fa-cog"></i></span>
        <span>Settings</span>
    </a>
</div>
