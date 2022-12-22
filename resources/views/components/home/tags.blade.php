@foreach($tags as $tag)
    <a href="#" class="w-full flex items-center hover:text-blue-500 text-slate-500">
        <span class="w-[30px]" style="color: {{ $tag->color }}"><i class="{{ $tag->icon }}"></i></span>
        <span>{{ $tag->name }}</span>
    </a>
@endforeach
