<x-guest-layout>
    <section>
        @foreach ($posts as $post)
            <article class="py-8 border-b border-gray-100">
                <header class="mb-2">
                    <h2 class="text-base text-gray-900 font-semibold md:text-lg hover:text-black">
                        <a href="/post/{{$post->slug}}">{{$post->title }}</a>
                    </h2>
                    <time class="text-xs text-gray-500">{{ $post->created_at->format('j F, Y') }}</time>
                </header>
                <div>
                    <p class="text-gray-700 mb-2">
                        {{$post->excerpt()}}
                    </p>
                    <a href="/post/{{$post->slug}}" class="text-gray-800 font-medium hover:text-black">Read more</a>
                </div>
            </article>
        @endforeach
    </section>
</x-guest-layout>