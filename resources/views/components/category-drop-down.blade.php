<div>
    <x-dropdown>
        <x-slot name="currentCategory">{{ isset($currentCategory) ? ucwords($currentCategory->name) : 'Categories' }}</x-slot>
        
        <x-dropdown-item href="/" :active="request()->routeIs('home')">All</x-dropdown-item>

        @foreach($categories as $category)
        <x-dropdown-item 
            href="/?category={{$category->slug}}"
            :active="isset($currentCategory) && $currentCategory->is($category)"
        >{{ ucwords($category->name) }}</x-dropdown-item>
        @endforeach
    </x-dropdown> 
</div>