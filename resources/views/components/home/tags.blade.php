@foreach($tags as $t)
    <a href="{{ route('tag', ['tag' => $t, 'slug' => Str::slug($t->name)]) }}" class="w-full flex items-center hover:text-blue-500 text-slate-500 {{ $t->id == $tag ? 'font-medium' : '' }}">
        <span class="w-[30px]" style="color: {{ $t->color }}"><i class="{{ $t->icon }}"></i></span>
        <span style="{{ $t->id == $tag ? ('color: ' . $t->color) : '' }}">{{ $t->name }}</span>
    </a>
@endforeach
