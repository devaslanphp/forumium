<button {{ $attributes->merge(['type' => 'submit']) }} class="{{$customClass ?? ""}} min-w-24 p-3 uppercase
font-semibold bg-stone-200
text-stone-400 rounded-md
hover:bg-custom-primary
hover:text-black
duration-150
ease-in-out
">
    {{ $slot }}
</button>
