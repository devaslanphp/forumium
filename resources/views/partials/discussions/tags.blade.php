<div class="flex items-center gap-1">
    @foreach($tags as $tag)
        <span class="text-sm font-medium px-2.5 py-0.5 rounded"
              style="background-color: {{ ($loop->index == 0 && !isset($ignore_first)) ? '#ffffff' : $tag->color }}; color: {{ ($loop->index == 0 && !isset($ignore_first)) ? $tag->color : '#ffffff' }}">
            {{ $tag->name }}
        </span>
    @endforeach
</div>
