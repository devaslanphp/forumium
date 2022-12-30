<div class="w-full">
    @if(!$discussion->is_locked)
        <button type="button" data-modal-toggle="add-reply-modal" class="w-full bg-blue-500 hover:bg-blue-600 hover:cursor-pointer px-3 py-2 rounded shadow hover:shadow-lg text-white font-medium text-center">
            Reply
        </button>
    @endif
</div>
