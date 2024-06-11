@include('layouts.header')

<div class="container mx-auto py-12 px-4 w-2/3 text-white">
    <h2 class="text-3xl font-bold mb-4">Edit History</h2>
    @if(session('success'))
        <div class="bg-green-500 text-white p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('about.update') }}" method="POST">
        @csrf
        <div class="mb-4">
            <textarea id="history" name="history" rows="10" class="w-full p-3 text-gray-900  rounded-lg">{{ old('history', $about->history ?? '') }}</textarea>
        </div>
        <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-lg">Save</button>
    </form>
</div>




<!-- Include TinyMCE from local path -->
<script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
<script>
    tinymce.init({
        selector: '#history',
        plugins: 'link image code',
        toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | outdent indent | link image | code',
        skin_url: '{{ asset('tinymce/js/tinymce/skins/ui/oxide') }}',
        content_css: '{{ asset('tinymce/js/tinymce/skins/content/default/content.css') }}',
    });
</script>