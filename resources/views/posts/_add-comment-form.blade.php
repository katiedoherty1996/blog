@auth
    <x-panel>
        <form method="POST" action="/posts/{{ $post->slug }}/comments">
            @csrf

            <header class="flex items-center">
                <img src="https://i.pravatar.cc/100?u={{ auth()->id() }}" alt="pravatar" class="rounded-full">
                <h2 class="ml-4">Want to participate?</h2>
            </header>

            <div class="mt-6">
                <textarea 
                    name="body" 
                    class="w-full text-sm focus:outline-none focus:ring" 
                    cols="30" 
                    rows="5" 
                    placeholder="Quick think of something to say!"
                    required
                >
                </textarea>

                @error('body')
                    <span class="text-xs text-red-500">{{ $message }}</span>
                @enderror
            </div>

            <x-submit-button>Post</x-submit-button>
        </form>
    </x-panel>
    @else
        <p>
            <a href="/login" class="hover:underline" >Log in to leave a comment!</a>
        </p>
    @endauth