<div class="w-full flex flex-col justify-center items-center gap-2 mt-5">
    <div class="text-center text-sm text-slate-700 uppercase flex items-center gap-5">
        <div class="w-[50px] h-1 border-b border-slate-300"></div>
        Or sign up with
        <div class="w-[50px] h-1 border-b border-slate-300"></div>
    </div>
    <div class="w-full flex flex-row flex-wrap justify-center items-center mt-2">
        @foreach(array_column(Socials::cases(), 'value') as $social)
            <a href="{{ route('socialite.redirect', $social) }}" class="text-white bg-[#{{ Socials::color($social) }}] hover:bg-[#{{ Socials::color($social) }}]/90 focus:ring-4 focus:outline-none focus:ring-[#{{ Socials::color($social) }}]/50 font-medium rounded-lg text-xs px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#{{ Socials::color($social) }}]/55 mr-2 mb-2">
                @include('partials.dialogs.socials-icon.' . $social)
                <span class="first-letter:uppercase">{{ $social }}</span>
            </a>
        @endforeach
    </div>
</div>
