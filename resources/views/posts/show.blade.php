<x-guest-layout>
    <section>
        <a href="/" class="mb-6 inline-block text-sm font-medium text-gray-600 mt-4 hover:text-black">Go back</a>
        <h1 class="tracking-tight font-semibold text-gray-900 mb-6 text-4xl md:text-6xl">{{ $post->title }}</h1>
        <div class="post--content">
            {!! $post->trixRichText->first()->content !!}
        </div>
    </section>
</x-guest-layout>