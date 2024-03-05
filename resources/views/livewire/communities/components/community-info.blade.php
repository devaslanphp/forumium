<div class="border rounded-lg bg-white overflow-hidden">
    <div class="h-[144px] w-full bg-gray-200">
        @if($community->feature_image)
            <img src="{{asset('storage/'.$community->feature_image)}}"
                 class="object-cover object-center w-full h-full">
        @endif
    </div>

    <div class="py-5 px-4 flex gap-5 flex-col">
        @if(!$community->is_public)
            <div class="text-xs text-stone-400">
                <i class="fa-solid fa-lock mr-2"></i> Private Group
            </div>
        @endif

        <div>
            {{$community->short_description ?? ""}}
        </div>

        <div class="text-stone-400">
            @if($community->links)
                @foreach($community->links as $link)
                    <a class="block hover:underline" href="{{$link['url']}}"> <i class="fa-solid
                        fa-link mr-3 text-xs"></i>{{$link['name']}}</a>
                @endforeach
            @endif

        </div>

        <div class="py-2 border-b border-t">
            <div class="flex justify-between">
                <div class="w-1/3  text-center">
                    <div class="text-lg">
                        [17.3k]
                    </div>
                    <span class="text-stone-400 text-xs">Members</span>
                </div>
                <div class="w-1/3 border-l text-center">
                    <div class="text-lg">
                        [31]
                    </div>
                    <span class="text-stone-400 text-xs">Online</span>
                    <span>

                            </span>
                </div>
                <div class="w-1/3 border-l text-center">
                    <div class="text-lg">
                        [3]
                    </div>
                    <span class="text-stone-400 text-xs">Admin</span>
                </div>
            </div>
        </div>
        <div>
            <x-controls.primary-button custom-class="bg-custom-primary w-full shadow text-black text-black">
                Join Group
            </x-controls.primary-button>
        </div>
    </div>
</div>
