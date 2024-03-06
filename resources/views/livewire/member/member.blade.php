<div class="flex flex-row gap-12">
    <div class="w-3/4">
        <div class="container mx-auto flex items-center md:flex-row flex-col">
            <div class="flex flex-row md:pr-10 md:mb-0 mb-6 pr-0 w-full md:w-auto md:text-left text-center">
                <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 ">
                    Members
                    1712
                </button>

                <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 ">
                    Admins
                    3
                </button>

                <button type="button"
                        class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-full text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 ">
                    Online
                    5
                </button>

            </div>
            <div class="flex md:ml-auto md:mr-0 mx-auto items-center flex-shrink-0 space-x-4">
                <button type="button" data-modal-target="invite-modal" data-modal-toggle="invite-modal"
                        class="bg-[#f1d07c] font-semibold rounded-md text-base px-7 py-2.5 me-2 mb-2">INVITE
                </button>
            </div>
        </div>
        <div class="border rounded-lg p-7 bg-white h-fit">
            <div class="flex items-center gap-4 mb-3">
                <img class="w-10 h-10 rounded-full"
                     src="https://images.unsplash.com/photo-1633332755192-727a05c4013d?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=1480&amp;q=80"
                     alt="">
                <div class="font-medium dark:text-white">
                    <div>Jese Leos</div>
                    <div class="text-sm font-semibold text-gray-500 dark:text-gray-400">
                        @genevive-dikeanowe-5859
                    </div>
                </div>
            </div>
            <div class="flex flex-col">
                <p class="text-gray-500 dark:text-gray-400 mb-3">Track work across the enterprise through an open,
                    collaborative
                    platform. Link issues across Jira and ingest data from other software development tools, so your
                    IT
                    support.
                </p>
                <p class="text-gray-500 dark:text-gray-400 mb-2 flex gap-2">
                    <svg class="w-5 h-5 text-green-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <path fill-rule="evenodd"
                              d="M2 12a10 10 0 1 1 20 0 10 10 0 0 1-20 0Zm13.7-1.3a1 1 0 0 0-1.4-1.4L11 12.6l-1.8-1.8a1 1 0 0 0-1.4 1.4l2.5 2.5c.4.4 1 .4 1.4 0l4-4Z"
                              clip-rule="evenodd"/>
                    </svg>
                    <span>Online now</span>
                </p>
                <p class="text-gray-500 dark:text-gray-400 mb-2 flex gap-2">
                    <svg class="w-5 h-5 text-gray-800 dark:text-white" aria-hidden="true"
                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M4 10h16m-8-3V4M7 7V4m10 3V4M5 20h14c.6 0 1-.4 1-1V7c0-.6-.4-1-1-1H5a1 1 0 0 0-1 1v12c0 .6.4 1 1 1Zm3-7h0v0h0v0Zm4 0h0v0h0v0Zm4 0h0v0h0v0Zm-8 4h0v0h0v0Zm4 0h0v0h0v0Zm4 0h0v0h0v0Z"/>
                    </svg>
                    <span>Joined March 04, 2024</span>
                </p>

            </div>
            <hr class="h-px my-8 bg-gray-200 border-0 dark:bg-gray-700">
        </div>

    </div>

    <div class="w-1/4">
        <livewire:communities.components.community-info :community="$community"/>
    </div>
</div>

<!-- Main modal -->
<div id="invite-modal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
    <div class="relative p-4 w-full max-w-2xl max-h-full">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t ">
                <h3 class="font-semibold text-gray-900">
                    Community name here
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="invite-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6"/>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-4 md:p-5 space-y-4">
                <p class="text-xl font-semibold leading-relaxed text-gray-900">
                    Invite
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Share a link to [Community Name Here] with your friends. </p>

                <div class="w-full">
                    <div class="relative">
                        <label for="copy-link" class="sr-only">Label</label>
                        <input id="copy-link" type="text"
                               class="col-span-6 bg-gray-50 border border-gray-300 text-gray-500 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full px-2.5 py-4 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-gray-400 dark:focus:ring-blue-500 dark:focus:border-blue-500"
                               value="https://www.skool.com/namehere/about" disabled readonly>
                        <button data-copy-to-clipboard-target="copy-link"
                                class="absolute end-2.5 top-1/2 -translate-y-1/2 text-gray-900 dark:text-gray-400 hover:bg-gray-100 dark:bg-gray-800 dark:border-gray-600 dark:hover:bg-gray-700 rounded-lg py-2 px-2.5 inline-flex items-center justify-center bg-white border-gray-200 border">
                                <span id="default-message" class="inline-flex items-center">
                                    <svg class="w-3 h-3 me-1.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                         fill="currentColor" viewBox="0 0 18 20">
                                        <path
                                            d="M16 1h-3.278A1.992 1.992 0 0 0 11 0H7a1.993 1.993 0 0 0-1.722 1H2a2 2 0 0 0-2 2v15a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2Zm-3 14H5a1 1 0 0 1 0-2h8a1 1 0 0 1 0 2Zm0-4H5a1 1 0 0 1 0-2h8a1 1 0 1 1 0 2Zm0-5H5a1 1 0 0 1 0-2h2V2h4v2h2a1 1 0 1 1 0 2Z"/>
                                    </svg>
                                    <span class="text-xs font-semibold">Copy</span>
                                </span>
                            <span id="success-message" class="hidden inline-flex items-center">
                                    <svg class="w-3 h-3 text-blue-700 dark:text-blue-500 me-1.5" aria-hidden="true"
                                         xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 16 12">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                              stroke-width="2" d="M1 5.917 5.724 10.5 15 1.5"/>
                                    </svg>
                                    <span class="text-xs font-semibold text-blue-700 dark:text-blue-500">Copied</span>
                                </span>
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

