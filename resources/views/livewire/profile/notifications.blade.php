<form wire:submit.prevent="perform">
    {{ $this->form }}
    <button type="submit" wire:loading.attr="disabled" class="mt-6 w-fit text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        Update your notifications
    </button>
</form>

<!--

<table class="lg:max-w-[60%] max-w-full w-full bg-slate-200">
    <thead>
    <tr class="border-b-2 border-white">
        <th class="p-2" colspan="10"></th>
        <th class="p-2" colspan="1">
            <div class="flex flex-col justify-center items-center gap-0 text-center text-slate-600 font-medium">
                <i class="fa-solid fa-bell"></i>
                Web
            </div>
        </th>
        <th class="p-2" colspan="1">
            <div class="flex flex-col justify-center items-center gap-0 text-center text-slate-600 font-medium">
                <i class="fa-regular fa-envelope"></i>
                Email
            </div>
        </th>
    </tr>
    </thead>
    <tbody>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone renames a discussion I started</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone renames a discussion I started</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone posts in a discussion I'm following</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone locks a discussion I started</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone includes me in a new private discussion</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone posts in a private discussion I'm a recipient of</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone adds me to an existing private discussion</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">A recipient user leaves a private discussion I'm a part of</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone merges one of my discussions with another</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">When one of my posts is up/down voted</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone sets my post as a best answer</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">A best answer is set in a discussion I participated in</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">An automated reminder to select a best answer in a discussion I started</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone replies to one of my posts</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone mentions me in a post</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone mentions a group I'm a member of in a post</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone likes one of my posts</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">A moderator warns me</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone creates a discussion in a tag I'm following</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    <tr class="border-b-2 border-white">
        <td colspan="10" class="p-2 lg:text-sm text-xs font-medium text-slate-600">Someone posts in a tag I'm following</td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
        <td colspan="1" class="p-2 text-center"><input type="checkbox" class="border-slate-300 hover:cursor-pointer hover:ring-2 hover:ring-offset-1 hover:ring-slate-500" /></td>
    </tr>
    </tbody>
</table>

-->
