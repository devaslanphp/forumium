<x-slot name="title">Sign up</x-slot>
<div class="flex w-full h-100 h-screen items-center justify-center gap-10 bg-stone-100">
    <div class="md:max-w-md">
        <div class="w-24 mb-8">
            <x-app.logo/>
        </div>
        <h1 class="text-2xl font-semibold mb-8">
            Everything you need to build community and make money online.
        </h1>
        <div class="flex flex-col mb-8 gap-5">
            <div class="text-lg">📈 &nbsp; Highly engaged</div>
            <div class="text-lg">❤️ &nbsp; Simple to setup</div>
            <div class="text-lg">🙂 &nbsp; Fun to use</div>
            <div class="text-lg">💰 &nbsp; Charge for membership</div>
            <div class="text-lg">📱 &nbsp; iOS + Android apps</div>
            <div class="text-lg">🌎 &nbsp; Millions of users daily</div>
        </div>
        <a class="text-base italic text-stone-400" href="mailto:help@skool.com">help@skool.com</a>
    </div>

    <div class="rounded-lg shadow-xl p-8 border md:max-w-md bg-white">
        <div class="text-center mb-4">
            <div class="text-2xl font-semibold">
                Create your community
            </div>
            <div class="my-3">
                Free for 14 days, then $99/month. Cancel anytime.
                All features. Unlimited everything. No hidden fees.
            </div>
            <div class="flex items-center justify-center">
                You were referred by <img src=""> Scott Max
            </div>
        </div>

        {{$this->form}}

        <div class="text-sm my-6">
            Your first charge will be on March 13th, 2024 for $99. Cancel anytime with 1-click. By clicking below, you
            accept our terms.
        </div>
        <button
            wire:click.prevent="submit"
            type="submit" class=" font-semibold w-full uppercase text-stone-400 bg-primary-500 hover:bg-primary
            focus:ring-4
            focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-600
            dark:hover:bg-blue-700
            focus:outline-none dark:focus:ring-blue-800">Create Community
        </button>

        {{--<form class="max-w-sm mx-auto relative" wire:submit.prevent="save">
            <div class="mb-8">
                <div class="relative mb-1">
                    <input type="text" id="floating_outlined" wire:model="name"
                           class="block px-2.5 pb-2.5 pt-4 w-full text-sm text-gray-900 bg-transparent rounded-lg border-1 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                           placeholder=" "/>
                    <label for="floating_outlined"
                           class="absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-4
                   scale-75 top-2 z-10 origin-[0] bg-white dark:bg-gray-900 px-2 peer-focus:px-2
                   peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100
                   peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-2
                   peer-focus:scale-75 peer-focus:-translate-y-4 rtl:peer-focus:translate-x-1/4
                   rtl:peer-focus:left-auto start-1 ml-2">Group Name</label>
                </div>
                <small class="text-xs italic text-gray-400">You can change this later</small>
                <div>
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>
            </div>

            <label for="card-number-input" class="sr-only">Card number:</label>
            <div class="relative">
                <input type="text" id="card-number-input"
                       class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pr-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                       placeholder="4242 4242 4242 4242" pattern="^4[0-9]{12}(?:[0-9]{3})?$"/>
                <div class="absolute inset-y-0 end-0 top-0 flex items-center pr-3.5 pointer-events-none right-2">
                    <svg fill="none" class="h-6 text-[#1434CB] dark:text-white" viewBox="0 0 36 21">
                        <path fill="currentColor"
                              d="M23.315 4.773c-2.542 0-4.813 1.3-4.813 3.705 0 2.756 4.028 2.947 4.028 4.332 0 .583-.676 1.105-1.832 1.105-1.64 0-2.866-.73-2.866-.73l-.524 2.426s1.412.616 3.286.616c2.78 0 4.966-1.365 4.966-3.81 0-2.913-4.045-3.097-4.045-4.383 0-.457.555-.957 1.708-.957 1.3 0 2.36.53 2.36.53l.514-2.343s-1.154-.491-2.782-.491zM.062 4.95L0 5.303s1.07.193 2.032.579c1.24.442 1.329.7 1.537 1.499l2.276 8.664h3.05l4.7-11.095h-3.043l-3.02 7.543L6.3 6.1c-.113-.732-.686-1.15-1.386-1.15H.062zm14.757 0l-2.387 11.095h2.902l2.38-11.096h-2.895zm16.187 0c-.7 0-1.07.37-1.342 1.016L25.41 16.045h3.044l.589-1.68h3.708l.358 1.68h2.685L33.453 4.95h-2.447zm.396 2.997l.902 4.164h-2.417l1.515-4.164z"/>
                    </svg>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-4 my-4">
                <div class="relative max-w-sm col-span-2">
                    <div class="absolute inset-y-0 start-0 flex items-center pointer-events-none left-2 pl-3">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                             xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="M20 4a2 2 0 0 0-2-2h-2V1a1 1 0 0 0-2 0v1h-3V1a1 1 0 0 0-2 0v1H6V1a1 1 0 0 0-2 0v1H2a2 2 0 0 0-2 2v2h20V4ZM0 18a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V8H0v10Zm5-8h10a1 1 0 0 1 0 2H5a1 1 0 0 1 0-2Z"/>
                        </svg>
                    </div>
                    <label for="card-expiration-input" class="sr-only">Card expiration date:</label>
                    <input datepicker datepicker-format="mm/yy" id="card-expiration-input" type="text"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="12/23" />
                </div>
                <div class="col-span-1">
                    <label for="cvv-input" class="sr-only">Card CVV code:</label>
                    <input type="number" id="cvv-input" aria-describedby="helper-text-explanation"
                           class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                           placeholder="CVV" />
                </div>
            </div>
            <div class="text-sm my-6">
                Your first charge will be on March 13th, 2024 for $99. Cancel anytime with 1-click. By clicking below, you accept our terms.
            </div>
            <button type="submit" class=" font-semibold w-full uppercase text-stone-400 bg-stone-200 hover:bg-primary
            focus:ring-4
            focus:ring-blue-300 font-medium rounded-lg text-lg px-5 py-2.5 me-2 mb-2 dark:bg-blue-600
            dark:hover:bg-blue-700
            focus:outline-none dark:focus:ring-blue-800">Start Free Trial
            </button>
        </form>--}}
    </div>
</div>

