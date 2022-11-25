<label for="{{$field}}" class="text-sm">{{Str::title($field)}}</label>
<div class="relative inline-block text-left" id="dropdown_{{$field}}">
    <div>
        <button id="dropdown_button_{{$field}}" type="button" class="inline-flex w-full justify-center rounded-md border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 focus:ring-offset-gray-100" aria-expanded="true" aria-haspopup="true">
            <span id="dropdown_displayed_text_{{$field}}">Select an option</span>
            <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
            </svg>
        </button>
    </div>
    <input type="hidden" value="" id="{{$field}}"/>
    <div id="dropdown_options_{{$field}}" class="hidden absolute left-0 z-10 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
        <div class="py-1" role="none">
            @foreach($options as $value => $option)
                <a href="javascript:void(0);" class="text-gray-700 block px-4 py-2 text-sm" role="menuitem" tabindex="-1" data-value="{{$value}}">{{$option}}</a>
            @endforeach
        </div>
    </div>
</div>

<script>
    $('#dropdown_button_{{$field}}').on('click', function () {
        $('#dropdown_options_{{$field}}').toggleClass('hidden');
    });
    $('#dropdown_options_{{$field}} div a').on('click', function () {
        $('#{{$field}}').attr('value', $(this).attr('data-value'));
        $('#dropdown_displayed_text_{{$field}}').html($(this).html());
        $('#dropdown_options_{{$field}}').toggleClass('hidden');
    })
</script>
