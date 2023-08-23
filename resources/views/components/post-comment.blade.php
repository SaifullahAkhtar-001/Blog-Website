@props(['comment'])
<x-panel>
    <article class="flex space-x-4">
        <div class="flex-shrink-0">
            <img src="{{asset('storage/' . $comment->author->ProfileImage)}}" alt="" width="60" height="60" class="object-contain rounded-full">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">
                    Posted
                    <time>{{$comment->created_at->format('d/m/Y')}}</time>
                </p>
            </header>
            <p>{{$comment->body}}</p>
        </div>
    </article>
</x-panel>
