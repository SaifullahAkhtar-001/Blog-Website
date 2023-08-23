<x-layout>
    @include ('posts._header')
    <main class="max-w-6xl lg:mx-auto respons_post mt-6 lg:mt-20 space-y-6">
        @if($posts->count())
           <x-posts-grid :posts="$posts"/>
            {{ $posts->links() }}
        @else
            <p class="text-center">No Post Yet Please Come Back Later!</p>
        @endif
    </main>
//mobile
</x-layout>


