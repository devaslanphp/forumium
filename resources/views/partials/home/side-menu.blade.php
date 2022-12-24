@if(
    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
    auth()->user()->can(Permissions::START_DISCUSSIONS->value)
)
    <button type="button" data-modal-toggle="add-discussion-modal" class="bg-blue-500 hover:bg-blue-600 hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center">
        Start a Discussion
    </button>
@endif
<div class="w-full flex flex-col gap-5">
    <a href="/discussions.html" class="w-full flex items-center text-blue-500 font-medium">
        <span class="w-[30px]"><i class="fa-regular fa-comments"></i></span>
        <span>All discussions</span>
    </a>
    <a href="/tags.html" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]"><i class="fa-solid fa-table-cells-large"></i></span>
        <span>Tags</span>
    </a>
</div>
<div class="w-full flex flex-col gap-5">
    <x-home.tags />
</div>
