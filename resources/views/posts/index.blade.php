<x-guest-layout>
    <section class="pb-16">

        <div class="flex items-center justify-between">
            <span class="text-2xl font-black block mb-4">All posts</span>
            <a href="/" class="text-sm text-gray-900 font-medium hover:underline">Back</a>
        </div>

        @foreach($posts as $post)
            <a 
                href="/posts/{{ $post->slug }}" 
                class="block mb-1 font-medium text-base tracking-tight text-gray-800 hover:text-black">
                {{ $post->title }}
            </a>
        @endforeach

    </section>
</x-guest-layout>