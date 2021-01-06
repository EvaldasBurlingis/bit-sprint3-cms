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
                    <a href="/dashboard/posts/{{ $post->id }}" class="text-base font-semibold text-black hover:underline hover:text-blue-700">{{ $post->title }}</a>
                </div>

                <div>
                    @if ($post->status->id === 1)
                        <span class="bg-green-600 text-xs text-white text-center block py-1 rounded-full w-24">{{ $post->status->title }}</span>
                    @else
                    <span class="bg-yellow-600 text-xs text-white py-1 text-center block rounded-full w-24">{{ $post->status->title }}</span>
                    @endif
                </div>
            </div>
        @endforeach
        </div>
    </section>
</x-app-layout>