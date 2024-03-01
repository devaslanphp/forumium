<div class="flex py-4">
    <div class="flex w-3/5 items-center gap-3">
        <div class="h-12 w-12 rounded-lg overflow-hidden">
            <img
                src="{{asset($community->feature_image ? 'storage/'.$community->feature_image : asset('img/logo-placeholder-image.png'))}}"
                class="object-cover object-center w-full
            h-full">
        </div>
        <div class="grow shrink-0">
            <div class="font-semibold">
                {{$community->name}}
            </div>
            <div>
                {{$community->is_public ? "Public": "Private"}} • {{$community->is_paid ? "Paid" : "Free"}}
            </div>
        </div>
    </div>
    <div class="w-2/5 flex gap-1 justify-end items-center">

        <div>
            <a
                href="{{route('profile.communities.community.settings', ['community'=>$community->slug])}}"
                data-tooltip-target="community-settings-tooltip" data-tooltip-placement="bottom"
                class="block text-stone-400 text-lg rounded-lg py-2 px-3 hover:bg-primary-200
                        hover:ease-in-out
                        hover:text-black
                        transition duration-150 ease-out">
                <i class="fa-solid fa-gear"></i>
            </a>

            <div id="community-settings-tooltip" role="tooltip"
                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Edit community settings
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
        <div>
            <a href="{{route('communities.community.preview', ['community'=>$community->slug])}}"
               data-tooltip-target="community-preview-tooltip" data-tooltip-placement="bottom"
               class="block text-stone-400 text-lg rounded-lg py-2 px-3 hover:bg-primary-200 hover:ease-in-out
                   hover:text-black
                   transition duration-150 ease-out ">
                <i class="fa-solid fa-eye"></i>
            </a>

            <div id="community-preview-tooltip" role="tooltip"
                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                View Community
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

        <div>
            <button
                data-tooltip-target="community-delete-tooltip" data-tooltip-placement="bottom"
                class="block text-stone-400 text-lg rounded-lg py-2 px-3 hover:bg-red-500
                   hover:text-white
                   transition duration-150 ease-out ">
                <i class="fa-solid fa-trash"></i>
            </button>

            <div id="community-delete-tooltip" role="tooltip"
                 class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Delete Community
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>

    </div>
</div>
