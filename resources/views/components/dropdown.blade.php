@props(['currentCategory'])

<div x-data="{ show: false }" @click.away="show = false">
    {{-- Trigger --}}
    <div @click="show = ! show">
        <button class="py-2 pl-3 pr-9 text-sm w-full font-semibold lg:w-32 text-left inline-flex">
            {{$currentCategory}}
            <svg class="transform -rotate-90 absolute pointer-events-none" style="right: 12px;" width="22"
            height="22" viewBox="0 0 22 22">
                <g fill="none" fill-rule="evenodd">
                    <path stroke="#000" stroke-opacity=".012" stroke-width=".5" d="M21 1v20.16H.84V1z">
                    </path>
                    <path fill="#222"
                            d="M13.854 7.224l-3.847 3.856 3.847 3.856-1.184 1.184-5.04-5.04 5.04-5.04z"></path>
                </g>
            </svg>
        </button>
    </div>

    {{--dropdown links---}}
    <div x-show="show" class="py-2 absolute bg-gray-100 w-full mt-2 rounded-xl z-50 overflow-auto max-h-52" style="display:none">
        {{ $slot }}
    </div>
</div>