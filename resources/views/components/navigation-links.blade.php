@props(['isColoredNavigation' => false])
<style>
    /* Normalize the group div to match other links */
    .group {
        display: inline-flex;
        align-items: center;
        position: relative;
        margin-left: 0px !important;
        /*margin: 0;*/
    }

    .group .absolute {
        left: 0;
        min-width: 12rem; /* Ensure it doesn’t shrink */
        white-space: nowrap;
    }

    /* Ensure the parent link inside the group has no extra spacing */
    .group a {
        padding: 0.5rem 1rem; /* Keep padding uniform */
        margin: 0; /* Remove unwanted margin */
        display: flex;
        align-items: center;
    }

    /* Keep the submenu visible on hover */
    .group .hidden {
        display: none;
        position: absolute;
        top: 100%;
        left: 0;
        background-color: white;
        border: 1px solid #ddd;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 50;
        min-width: 12rem;
    }

    .group:hover .hidden {
        display: block !important;
    }
    /* Ensure no parent clips the submenu */
    nav {
        position: relative;
        overflow: visible;
    }
</style>
@foreach (translate('navigation.main.menu') ?? [] as $item)
    @if (data_get($item, 'link') === '/publishers')
        @php
            $publishers = cache()->remember('activePublishers', 86400, function () {
                return \App\Models\Publisher::activePublishers()->select('name', 'id')->get()->toArray();
            });
        @endphp
        <div class="relative group inline-flex items-center ml-0">
            <a href="#"
               class="px-4 py-2 focus:outline-none {{$isColoredNavigation ? 'hover:text-gray-200' : 'hover:text-blue-600'}}" style="margin: 0;">
                {{ data_get($item, 'text') }}
            </a>
            <div class="absolute top-full left-0 hidden group-hover:block bg-white border shadow-lg px-4 py-1 mt-0 z-50 w-48">
                @foreach ($publishers as $publisher)
                    <a href="{{ route('publishers.show', data_get($publisher, 'id')) }}"
                       class="block py-2 hover:bg-gray-100 transition-colors duration-200">
                        {{ data_get($publisher, 'name.' . app()->getLocale(), 'no-lang-key') }}
                    </a>
                @endforeach
            </div>
        </div>
    @else
        <a href="{{ data_get($item, 'link') }}" class="px-4 py-2 focus:outline-none {{$isColoredNavigation ? 'hover:text-gray-200' : 'hover:text-blue-600'}}" style="margin: 0;">
            {{ data_get($item, 'text') }}
        </a>
    @endif
@endforeach
