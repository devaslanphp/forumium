<div class="flex items-center gap-1">
    @foreach($tags as $tag)
        <span onclick="window.location.href ='{{ route('tag', ['tag' => $tag, 'slug' => Str::slug($tag->name)]) }}'" class="w-fit text-xs font-medium px-2.5 py-0.5 rounded flex items-center justify-center text-center hover:cursor-pointer"
              style="background-color: {{ ($loop->index == 0 && !isset($ignore_first)) ? '#ffffff' : $tag->color }}; color: {{ ($loop->index == 0 && !isset($ignore_first)) ? $tag->color : '#ffffff' }}">
            {{ $tag->name }}
        </span>
    @endforeach
</div>
