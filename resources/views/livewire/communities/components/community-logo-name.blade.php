<{{$isLink ? 'a' : 'span'}} href="{{route('communities.community.home', ['community'=>$community->slug])}}"
   class="{{$customClass}} text-lg block dark:hover:text-white flex items-center gap-2 font-semibold">
    <img src="{{$logo}}" class="w-10 h-10 object-cover object-center rounded-lg"/>{{$community->name}}
</{{$isLink ? 'a' : 'span'}}>
