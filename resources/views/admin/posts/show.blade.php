<x-app-layout>
    <section class="py-6">
        <span class="block text-2xl text-blue-700 font-bold tracking-tighter mb-6">{{ $post->title }}</span>

        <form method="POST" action="/dashboard/posts/{{ $post->id }}" class="max-w-2xl" id="editPostForm">
            @csrf
            @method('PATCH')

            <div>
                <input type="hidden" name="id" value="{{ $post->id }}">
                <input type="text" name="title" placeholder="Post title" required value="{{ $post->title }}">
    
                <select name="status_id" id="" class="mb-4" required>
                    <option value="1" {{ $post->status->id === 1 ? 'selected' : '' }}>Published</option>
                    <option value="2" {{ $post->status->id === 2 ? 'selected' : '' }}>Draft</option>
                </select>
            </div>
            <div class="mb-4">
                @trix($post, 'content', [ 'hideTools' => ['file-tools'] ])
            </div>

        </form>  
        
        <div class="flex">
            <input form="editPostForm" type="submit" value="Edit" class="bg-blue-600 text-white py-2 text-sm px-4 rounded-md hover:bg-blue-700 mr-4">

            <form method="POST" action="/dashboard/posts/{{ $post->id }}" class="max-w-2xl">
                @method('DELETE')
                @csrf
    
                <input type="submit" value="Delete" class="bg-red-600 text-white py-2 text-sm px-4 rounded-md hover:bg-red-700">
            </form>   
        </div>

    </section>
</x-app-layout>