<{{$isLink ? 'a' : 'span'}} href="{{route('communities.community.preview', ['community'=>$community->slug])}}"
   class="{{$customClass}}
   text-lg block
   dark:hover:text-white
   flex
   items-center
   gap-2
   font-semibold">
    <img src="{{$community->logo ? "/storage/$community->logo" :
                                      "https://ui-avatars.com/api/?name=". urlencode($community->name)
                                      ."&background=random"}}"
         class="w-10 h-10 object-cover object-center rounded-lg"/>{{$community->name}}
</{{$isLink ? 'a' : 'span'}}>
