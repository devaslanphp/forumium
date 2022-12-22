<div class="flex items-center gap-1">
    @foreach($user->roles as $role)
        <span class="text-sm font-medium px-2.5 py-0.5 rounded text-white" style="background-color: {{ $role->color }}">{{ $role->name }}</span>
    @endforeach
</div>
