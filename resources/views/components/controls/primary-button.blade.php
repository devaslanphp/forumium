<button {{ $attributes->merge(['type' => 'submit']) }} class="{{$customClass ?? ""}} min-w-24 p-3 uppercase
font-semibold bg-custom-primary
text-custom-foreground-primary rounded-md
hover:bg-custom-primary-hover
hover:text-black
duration-150
ease-in-out
">
    {{ $slot }}
</button>
