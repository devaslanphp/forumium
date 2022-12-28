<div class="w-full flex flex-col justify-center items-center gap-2 mt-5">
    <div class="text-center text-sm text-slate-700 uppercase flex items-center gap-5">
        <div class="w-[50px] h-1 border-b border-slate-300"></div>
        Or sign up with
        <div class="w-[50px] h-1 border-b border-slate-300"></div>
    </div>
    <div class="w-full flex flex-row flex-wrap justify-center items-center mt-2">
        @foreach(Socials::enabledCases() as $social)
            <a href="{{ route('socialite.redirect', $social) }}" class="text-white focus:ring-0 focus:outline-none font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center mr-2 mb-2"
               style="background-color: {{ '#' . Socials::color($social) }}">
                @include('partials.dialogs.socials-icon.' . $social)
                <span class="first-letter:uppercase">{{ $social }}</span>
            </a>
        @endforeach
    </div>
</div>
