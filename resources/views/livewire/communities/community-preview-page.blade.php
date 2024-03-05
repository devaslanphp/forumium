<x-slot name="title">{{$community->name}}</x-slot>

<div class="flex gap-12">
    <div class="w-3/4">
        <div class="border rounded-lg p-7 bg-white">
            <h1 class="text-left text-2xl font-semibold mb-7">{{$community->name}}</h1>
            @if($community->banner_images)
                <div
                    class="flex flex-col gap-3 mb-7">
                    <div class="h-[380px] border rounded-lg bg-gray-200 overflow-hidden">
                        <img class="w-full h-full object-cover object-center"
                             src="{{ asset('storage/' . $selectedImage) }}"
                             alt="Selected image preview">

                    </div>
                    <div class="flex gap-2">
                        @foreach($community->banner_images as $image)
                            <div
                                wire:click="selectImage('{{$image}}')"
                                class="rounded-lg w-[90px] h-[90px] border bg-gray-200 overflow-hidden bg-center
                                bg-cover {{$image === $selectedImage ? 'border-4 border-black' : ""}}"
                                style="background-image: url('/storage/{{$image}}')">
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="flex items-center gap-10 mb-7">
                <div>@if($community->is_public)
                        <i class="fa-solid fa-unlock mr-2"></i> Public
                    @else
                        <i class="fa-solid fa-lock mr-2"></i> Private
                    @endif
                </div>
                <div>
                    <i class="fa-solid fa-users mr-2"></i> [1.5k] Members
                </div>
                <div>
                    <i class="fa-solid fa-tag mr-2"></i> {{$community->is_paid ? "Paid" : "Free"}}
                </div>
                <div class="flex items-center gap-2">
                    <img src="{{$community->creator->avatarUrl }}" alt="Avatar"
                         class="rounded-full w-6 h-6 border order-slate-200 shadow"/>
                    {{$community->creator->name}}
                </div>
            </div>
            @if($community->long_description)
                <div>
                    {!!  nl2br($community->long_description) ?? ""!!}
                </div>
            @endif
        </div>
    </div>

    <div class="w-1/4">
        <livewire:communities.components.community-info :community="$community"/>
    </div>
</div>
