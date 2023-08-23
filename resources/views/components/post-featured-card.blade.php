@props(['post'])
<a href="/posts/{{$post->slug}}">
<article class="bg-neutral-700 transition duration-300 hover:shadow-xl border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8 lg resimg" >
            <img src="{{asset('storage/' . $post->thumbnail)}}" alt="Blog Post illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <x-category-btn :category="$post->category"/>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        <a href="/posts/{{$post->slug}}">
                        {!!$post->title!!}
                        </a>
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                                        Published <time>{{$post->created_at->diffForHumans()}}</time>
                                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {!! $post->excerpt !!}
                </p>

            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <img src="/images/lary-avatar.svg" alt="Lary avatar">
                    <div class="ml-3 font-bold">
                        <a href="/?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </div>
                </div>

                <div>
                    <a href="/posts/{{$post->slug}}"
                       class="transition-colors duration-300 text-xs font-semibold bg-purple-500 hover:bg-gray-300 rounded-full py-2 px-8 whitespace-nowrap"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
</a>
