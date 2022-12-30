<x-layout>

    <x-slot name="title">{{ $discussion->name }}</x-slot>

    <livewire:discussion.header :discussion="$discussion" />

    <!-- Page content -->
    <div class="w-full flex justify-center items-center px-2 sm:px-4 py-10">
        <div class="container  mx-auto flex lg:flex-row flex-col gap-10">
            <div class="flex flex-col lg:w-5/6 w-full lg:order-1 order-2">
                <livewire:discussion.discussion-details :discussion="$discussion" />
                <livewire:discussion.replies :discussion="$discussion" />
            </div>
            <div class="flex lg:flex-col flex-row gap-3 lg:w-1/6 w-full lg:order-2 order-1">
                @if(
                    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                    (
                        auth()->user()->id === $discussion->user_id
                        || auth()->user()->can(Permissions::REPLY_TO_DISCUSSIONS->value)
                    )
                )
                    <livewire:discussion.reply-btn :discussion="$discussion" />
                @endif
                @if(
                    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                    (auth()->user()->id != $discussion->user_id)
                )
                    <livewire:discussion.follow :discussion="$discussion" />
                @endif
                @if(
                    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                    auth()->user()->can(Permissions::LOCK_DISCUSSIONS->value)
                )
                    <livewire:discussion.lock :discussion="$discussion" />
                @endif
                @if(
                    (auth()->user() && auth()->user()->hasVerifiedEmail()) &&
                    (
                        auth()->user()->id === $discussion->user_id
                        || auth()->user()->can(Permissions::VIEW_POSTS_STATS->value)
                    )
                )
                    <div class="w-full flex gap-1 justify-between items-center text-sm text-slate-500">
                        <div>
                            <i class="fa-regular fa-eye"></i> <span class="font-medium">Total views:</span> {{ $discussion->visits }}
                        </div>
                        <div>
                            <i class="fa-regular fa-user"></i> <span class="font-medium">Unique views:</span> {{ $discussion->unique_visits }}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    @if(auth()->user() && auth()->user()->hasVerifiedEmail())
        <!-- Add a reply modal -->
        <div id="add-reply-modal" data-modal-placement="bottom-center" data-modal-backdrop="static" tabindex="-1" class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
            <div class="relative w-full h-full max-w-7xl md:h-auto">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-slate-700">
                    <button id="hide-reply-modal" type="button" class="absolute top-3 right-2.5 text-slate-400 bg-transparent hover:bg-slate-200 hover:text-slate-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-slate-800 dark:hover:text-white" data-modal-toggle="add-reply-modal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                    <livewire:discussion.reply :discussion="$discussion" />
                </div>
            </div>
        </div>
    @endif

    @push('scripts')
        <script>
            function scrollToElement(id, color) {
                setTimeout(() => {
                    const element = document.getElementById(id);
                    element.scrollIntoView({
                        behavior: 'smooth'
                    });
                    if (color) {
                        element.classList.add('bg-yellow-50');
                    }
                }, 200)
            }
        </script>
        @if(request('c') && request('r'))
            <script>
                window.addEventListener('load', function () {
                    const reply = document.getElementById("reply-{{ request('r') }}");
                    scrollToElement("reply-{{ request('r') }}", false);
                    reply.querySelector('.toggle-comments').click();
                    window.addEventListener('replyCommentsLoaded', function () {
                        scrollToElement("comment-{{ request('c') }}", true);
                    });
                });
            </script>
        @elseif(request('c') && request('d'))
            <script>
                window.addEventListener('load', function () {
                    const discussion = document.getElementById("discussion");
                    discussion.querySelector('.toggle-comments').click();
                    window.addEventListener('discussionCommentsLoaded', function () {
                        scrollToElement("comment-{{ request('c') }}", true);
                    });
                });
            </script>
        @elseif(request('r'))
            <script>
                window.addEventListener('load', function () {
                    scrollToElement("reply-{{ request('r') }}", true);
                });
            </script>
        @elseif(request('d'))
            <script>
                window.addEventListener('load', function () {
                    scrollToElement("discussion", true);
                });
            </script>
        @endif

    @endpush


</x-layout>
