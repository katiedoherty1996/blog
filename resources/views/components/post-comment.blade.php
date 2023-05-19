@props(['comment'])

<x-panel class="bg-gray-50">
    <article class="flex space-x-4">
        <div class="flex-shrink:0">
            <img src="https://i.pravatar.cc/100?u={{ $comment->user_id }}" alt="pravatar">
        </div>
        <div>
            <header class="mb-4">
                <h3 class="font-bold">{{ $comment->author->username }}</h3>
                <p class="text-xs">Posted 8 months ago</p>
                <time>{{ $comment->created_at->format("F j, Y, g:i a") }}</time>
            </header>

            <p>{{ $comment->body }}</p>
        </div>
    </article>
</x-panel>