@include('livewire.classroom.create')
<div class="grid grid-cols-3 gap-4">
    @foreach ($courses as $course)
        <div
            class="relative flex flex-col overflow-hidden rounded-xl bg-white bg-clip-border text-gray-700 shadow-md hover:shadow-lg hover:shadow-gray-900/20">
            <div
                class="relative m-0 overflow-hidden text-gray-700 bg-transparent rounded-none shadow-none bg-clip-border">
                <img src="https://dummyimage.com/720x400" alt="ui/ux review check" />
            </div>

            <div class="p-6">
                <div class="flex items-center justify-between mb-3">
                    <h5
                        class="block font-sans text-xl antialiased font-medium leading-snug tracking-normal text-blue-gray-900">
                        {{ $course->title }}
                    </h5>
                    <p
                        class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                        <button id="dropdownMenuIconButton" data-dropdown-toggle="dropdownDots"
                            data-dropdown-placement="bottom-start"
                            class="inline-flex self-center items-center p-2 text-sm font-medium text-center text-gray-900 bg-white rounded-lg hover:bg-gray-100 focus:ring-4 focus:outline-none dark:text-white focus:ring-gray-50 dark:bg-gray-900 dark:hover:bg-gray-800 dark:focus:ring-gray-600"
                            type="button">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 4 15">
                                <path
                                    d="M3.5 1.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 6.041a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Zm0 5.959a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0Z" />
                            </svg>
                        </button>
                    </p>
                </div>
                <p class="block font-sans text-base antialiased font-light leading-relaxed text-gray-700">
                    {{ $course->description }}
                </p>
            </div>
            <div class="p-6 pt-3">
                <button
                    class="block w-full select-none rounded-lg bg-gray-100 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-gray-600"
                    type="button">
                    OPEN
                </button>
            </div>
        </div>
        <div id="dropdownDots"
            class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40 dark:bg-gray-700 dark:divide-gray-600">
            <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownMenuIconButton">
                <li>
                    <a
                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        wire:click="edit({{ $course->id }})">Edit</a>
                </li>
                <li>
                    <button
                        class="cursor-pointer block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"
                        wire:click="delete({{ $course->id }})">Delete</button>
                </li>
            </ul>
        </div>
    @endforeach
</div>
