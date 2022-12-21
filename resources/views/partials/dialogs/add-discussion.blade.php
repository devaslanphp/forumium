<!-- Add a discussion modal -->
<div id="add-discussion-modal" data-modal-placement="bottom-center" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full max-w-7xl md:h-auto">
        <!-- Modal content -->
        <form action="#" method="POST" class="relative bg-white rounded-lg shadow dark:bg-slate-700">
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <h3 class="mb-8 text-xl font-medium text-slate-900 dark:text-white">Start a discussion</h3>
                <span class="text-slate-500">
                        ... Form goes here ...
                    </span>
            </div>
            <!-- Modal footer -->
            <div class="flex items-center px-6 pb-6 space-x-2 rounded-b">
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Post discussion</button>
                <button data-modal-toggle="add-discussion-modal" type="button" class="text-slate-500 bg-white hover:bg-slate-100 focus:ring-4 focus:outline-none focus:ring-slate-200 rounded border border-slate-200 text-sm font-medium px-5 py-2.5 hover:text-slate-900 focus:z-10 dark:bg-slate-700 dark:text-slate-300 dark:border-slate-500 dark:hover:text-white dark:hover:bg-slate-600 dark:focus:ring-slate-600">Cancel</button>
            </div>
        </form>
    </div>
</div>
