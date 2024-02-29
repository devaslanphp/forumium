<x-slot name="title">{{$community->name}}</x-slot>

<div class="flex gap-12">
    <div class="w-3/4 border rounded-lg p-7 bg-white">
        <h1 class="text-2xl font-semibold mb-7">{{$community->name}}</h1>
        <div class="flex flex-col gap-3 mb-7">
            <div class="h-[380px] border rounded-lg bg-gray-200 ">

            </div>
            <div class="flex">
                <div class="rounded-lg w-[90px] h-[90px] border bg-gray-200">

                </div>
            </div>
        </div>

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
        <div>
            {{$community->description}}
        </div>
    </div>

    <div class="w-1/4">
        <div class="border rounded-lg bg-white overflow-hidden">
            <div class="h-[144px] w-full bg-gray-200">

            </div>
            <div class="py-5 px-4 flex gap-5 flex-col">
                @if(!$community->is_public)
                    <div class="text-xs text-stone-400">
                        <i class="fa-solid fa-lock mr-2"></i> Private Group
                    </div>
                @endif

                <div>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ab, delectus dicta
                </div>

                <div class="text-stone-400">
                    <a href="#"> <i class="fa-solid fa-link"></i> [User's instagram]</a>
                </div>

                <div class="py-2 border-b border-t">
                    <div class="flex justify-between">
                        <div class="w-1/3  text-center">
                            <div class="text-lg">
                                [17.3k]
                            </div>
                            <span class="text-stone-400 text-xs">Members</span>
                        </div>
                        <div class="w-1/3 border-l text-center">
                            <div class="text-lg">
                                [31]
                            </div>
                            <span class="text-stone-400 text-xs">Online</span>
                            <span>

                            </span>
                        </div>
                        <div class="w-1/3 border-l text-center">
                            <div class="text-lg">
                                [3]
                            </div>
                            <span class="text-stone-400 text-xs">Admin</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
