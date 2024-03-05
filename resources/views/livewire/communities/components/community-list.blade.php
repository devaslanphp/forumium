<div>
    @foreach($communities as $community)
        <livewire:communities.components.community-list-item :community="$community"/>
    @endforeach
</div>
