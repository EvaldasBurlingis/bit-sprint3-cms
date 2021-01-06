<x-app-layout>
    <section class="py-6">
        <span class="block text-2xl text-blue-700 font-bold tracking-tighter mb-6">Create new post</span>

        <form method="POST" action="/dashboard/posts/new" class="max-w-2xl">
            @csrf
            
            <input type="text" name="title" placeholder="Post title">

            <select name="status_id" id="" class="mb-4">
                <option value="1">Published</option>
                <option value="2">Draft</option>
            </select>

            @trix(\App\Post::class, 'content', [ 'hideTools' => ['file-tools'] ])

            <input type="submit" value="Create">
        </form>   
    
    </section>
</x-app-layout>