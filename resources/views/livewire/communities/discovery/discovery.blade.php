<div>
    <x-slot name="title">Discover Communities</x-slot>
    <div class="mb-10">
        <h1>Discover communities</h1>
        <div class="text-xl text-center">
            or <a class="text-blue-700" href="{{route('communities.community.create')}}">create your own</a>
        </div>
    </div>

    <div class="grid grid-cols-3 gap-8">
        @foreach($communities as $community)
            <livewire:communities.discovery.community-item :community="$community"/>
        @endforeach
    </div>
</div>
