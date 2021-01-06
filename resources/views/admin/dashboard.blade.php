<x-app-layout>
    <section class="py-6">

        <div class="flex justify-between items-center mb-8">
            <span class="block text-2xl text-blue-700 font-bold tracking-tighter mb-6">All posts</span>
            <a 
                href="/dashboard/posts/new"
                class="font-medium text-sm text-black hover:underline">New post
            </a>
        </div>

        <div>
        @foreach ($posts as $post)
            <div class="py-4 border-b border-blue-300 flex justify-between items-center">
                <div>
                    <span class="mr-2 text-sm text-gray-500">{{ $post->created_at->format('j F, Y') }}</span>
                    <a href="/dashboard/post/preview/{{ $post->id }}" class="text-base font-semibold text-black hover:underline hover:text-blue-700">{{ $post->title }}</a>
                </div>

                <div>
                </div>
            </div>
        @endforeach
        </div>
    </section>
</x-app-layout>