<form wire:submit.prevent="perform">
    {{ $this->form }}
    <button type="submit" wire:loading.attr="disabled" class="mt-6 w-full text-white bg-blue-700 disabled:bg-slate-300 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
        {{ $forgotPassword ? 'Send recovery email' : 'Log in to your account' }}
    </button>
    <div class="w-full flex justify-center items-center text-center">
        <button class="w-fit p-2 text-blue-500 hover:text-blue-700 hover:cursor-pointer hover:underline" type="button" wire:click="toggleForgotPassword()">
            {{ $forgotPassword ? 'Back to login' : 'Forgot password?' }}
        </button>
    </div>
</form>
