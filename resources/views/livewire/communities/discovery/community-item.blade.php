<div class="">
    <a
        href="{{route('communities.community.preview', ['community'=> $community->slug])}}"
        class="relative max-w-sm bg-white border border-gray-200 rounded-xl overflow-hidden dark:bg-gray-800
        dark:border-gray-700
 flex flex-col h-96 hover:shadow-lg">

        <div class="h-44 w-full bg-gray-200">
            @if($community->feature_image)
                <img class="w-full h-full object-center object-cover"
                     src="/storage/{{$community->feature_image}}"
                     alt=""/>
            @endif
        </div>

        <div class="grow p-5 flex flex-col">
            <livewire:communities.components.community-logo-name :community="$community"/>

            <div class="mb-4 mt-5 text-base text-gray-700 dark:text-gray-400
            line-clamp-3">{{$community->short_description}}</div>

            <div class="mt-auto">
                {{$community->is_public ? "Public": "Private"}}<span class="mx-2">•</span>{{$community->is_paid ? "Paid" :
            "Free"}}<span class="mx-2">•</span>[3.2k Members]
            </div>
        </div>
    </a>

</div>
