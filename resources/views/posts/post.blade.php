<x-guest-layout>
    <section>
        <a href="/" class="mb-6 inline-block text-sm font-medium text-gray-600 mt-4 hover:text-black">Go back</a>
        <h1 class="text-xl tracking-tight font-semibold text-gray-900 mb-6 md:text-2xl">{{ $post->title }}</h1>
        <p class="leading-7 text-gray-700">{{ $post->body }}</p>
    </section>
</x-guest-layout>