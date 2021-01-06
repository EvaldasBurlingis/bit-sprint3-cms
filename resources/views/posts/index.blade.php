<x-guest-layout>
    <section class="pb-16">

        <div class="flex items-center justify-between">
            <span class="text-2xl font-black block mb-4">All posts</span>
            <a href="/" class="text-sm text-gray-900 font-medium hover:underline">Back</a>
        </div>

        @foreach($posts as $post)
            <article class="flex items-center">
                <time class="text-xs text-gray-500 font-light mr-4">{{ $post->created_at->format('j F, Y') }}</time>
                <a 
                    href="/posts/{{ $post->created_at->format('d-m-y') }}/{{ $post->slug }}" 
                    class="block mb-1 font-medium text-base tracking-tight text-gray-800 hover:text-black">
                    {{ $post->title }}
                </a>
            </article>
        @endforeach

    </section>
</x-guest-layout>