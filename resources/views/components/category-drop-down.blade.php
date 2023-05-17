<div>
    <x-dropdown>
        <x-slot name="currentCategory">{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}</x-slot>
        
        <x-dropdown-item href="/?{{ http_build_query(request()->except('category', 'page')) }}" :active="request()->routeIs('home')">All</x-dropdown-item>

        @foreach($categories as $category)
            <x-dropdown-item 
                {{--Get an array of the request data minus the categor, turn into query string & append that to the href--}}
                {{--This basically adds the category on if a search is already in progress--}}
                href="/?category={{$category->slug}}&{{ http_build_query(request()->except('category', 'page')) }}"
                :active="isset($currentCategory) && $currentCategory->is($category)"
            >{{ ucwords($category->name) }}</x-dropdown-item>
        @endforeach
    </x-dropdown> 
</div>