@include('forms::components.rich-editor')

@push('scripts')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tributejs/3.3.2/tribute.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tributejs/3.3.2/tribute.min.js"></script>
    <script>
        window.addEventListener('load', () => {
            const id = '{{ $getId() }}';
            const tribute = new Tribute({
                values: @json($getMentionsItems(), JSON_PRETTY_PRINT|JSON_UNESCAPED_SLASHES),
                selectTemplate: function(item) {
                    if (typeof item === "undefined") return null;
                    if (this.range.isContentEditable(this.current.element)) {
                        return '<a href="' + item.original.link + '">@' + item.original.key + '</a>';
                    }
                    return "@" + item.original.key;
                },
            });
            tribute.attach(document.getElementById(id));
            const editor = document.getElementById(id).editor;
            if (editor != null) {
                editor.composition.delegate.inputController.events.keypress = function() {};
                editor.composition.delegate.inputController.events.keydown = function() {};
            }
        });
    </script>
@endpush
