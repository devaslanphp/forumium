<div>
    @foreach($communities as $community)
        <livewire:community.components.community-list-item :community="$community"/>
    @endforeach
</div>
