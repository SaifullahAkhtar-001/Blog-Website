@props(['post'])

<article
    {{ $attributes->merge(['class' => 'bg-neutral-700 transition duration-300 hover:shadow-xl border border-black border-opacity-0 hover:border-opacity-5 rounded-xl mb-4']) }}>
    <div class="py-6 px-5 h-full flex flex-col">
        <div class="flex justify-center">
            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl justify-center">
        </div>

        <div class="mt-6 flex flex-col justify-between flex-1">
            <header>
                <div class="space-x-2">
                    <x-category-btn :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl clamp one-line">
                        <a href="/posts/{{ $post->slug }}">
                            {{ $post->title }}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Published <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-4 space-y-4">
                {!! $post->excerpt !!}
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3">
                        <h5 class="font-bold">
                            <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </h5>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold dark:bg-blue-500 bg-purple-500 hover:bg-purple-700 rounded-full py-2 px-8 whitespace-nowrap"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
