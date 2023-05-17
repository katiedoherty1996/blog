<x-layout>
    @include ('posts._header')

    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts" />

            {{-- when you call pagination method you can call posts links method --}}
            {{$posts->links()}}
        @else
            <p class="text-center">No Posts Yet. Please Check Back Later</p>
        @endif
    </main>
<!--go through each post -->
<!--when the layout.blade file is in the component we can use x-layout and x-slot to call this layout-->
    {{-- @foreach ($posts as $post)
        <article>
            <h1><a href="/posts/{{$post->slug}}">{{ $post->title }}</a></h1>
            <p>
                By <a href='/authors/posts/categories/{{$post->author->username}}'>{{$post->author->name}}</a> in <a href='/categories/post/{{ $post->category->slug }}'>{{ $post->category->name }}</a>
            </p>
        </article>

        <div>
            {{ $post->excerpt }}
        </div>
    @endforeach --}}
</x-layout>

