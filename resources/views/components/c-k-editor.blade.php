<div>
    <textarea name="{{ $name }}" id="{{ $id ?? $name }}" {{ $attributes }}>{{ $slot }}</textarea>
    @once
        @vite(['resources/js/ckeditor-custom.js', 'resources/css/ckeditor-custom.css'])
    @endonce
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            if (window.ClassicEditor) {
                ClassicEditor.create(document.querySelector('#{{ $id ?? $name }}'), window.editorConfig)
                    .catch(error => {
                        console.error(error);
                    });
            }
        });
    </script>
</div>