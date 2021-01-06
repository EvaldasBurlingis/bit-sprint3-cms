<x-app-layout>

    <section class="py-6">
        <span class="block text-2xl text-blue-700 font-bold tracking-tighter mb-6">Create new post</span>

        <form method="POST" action="/dashboard/posts/new" class="max-w-2xl">
            @csrf

            <div>
                <input type="text" name="title" placeholder="Post title" required>
    
                <select name="status_id" id="" class="mb-4" required>
                    <option value="1">Published</option>
                    <option value="2">Draft</option>
                </select>
            </div>
            <div class="mb-4">
                @trix(\App\Post::class, 'content', [ 'hideTools' => ['file-tools'] ])
            </div>

            <input type="submit" value="Create" class="bg-blue-600 text-white py-2 text-sm px-4 rounded-md hover:bg-blue-700">
        </form>   
    </section>
    
</x-app-layout>