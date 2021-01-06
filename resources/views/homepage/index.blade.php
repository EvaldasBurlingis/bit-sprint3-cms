<x-guest-layout>
    <section>

        <div class="flex items-center justify-between">
            <span class="text-2xl font-black block mb-4">All posts</span>
            <a href="/posts" class="text-sm text-gray-900 font-medium hover:underline">See all</a>
        </div>

        @foreach ($posts as $post)
            <article class="py-8 border-b border-gray-100">
                <header class="mb-2">
                    <h2 class="text-lg md:text-xl text-gray-900 font-semibold hover:text-black">
                        <a href="/posts/{{$post->slug}}">{{$post->title }}</a>
                    </h2>
                    <time class="text-xs text-gray-500 font-light">{{ $post->created_at->format('j F, Y') }}</time>
                </header>
                <div>
                    <div class="text-gray-700 text-sm font-normal mb-2">
                        {!! $post->excerpt() !!}
                    
                    </div>
                    <a href="/posts/{{$post->slug}}" class="text-gray-800 font-medium hover:text-black">Read more</a>
                </div>
            </article>
        @endforeach
    </section>
</x-guest-layout>