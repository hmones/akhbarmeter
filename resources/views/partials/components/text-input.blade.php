<label for="{{$field ?? ''}}" class="text-sm">{{Str::of($field)->ucfirst()->replace('_', ' ') ?? ''}}</label>
@if(in_array($field, $model->translatable ?? []))
    <div id="{{$field}}_ar_input" class="flex flex-row w-full items-center">
        <input type="text" id="{{$field ?? ''}}" name="{{($field ?? '') . '[ar]'}}"
               class="p-3 h-12 border border-gray-300 rounded-l mt-1 w-full"
               value="{{$model->getTranslation($field, 'ar')}}">
        <button type="button" class="px-3 h-12 bg-gray-200 rounded-r hover:bg-gray-300 mt-1" id="{{$field}}_ar_button">Ar</button>
    </div>

    <div id="{{$field}}_en_input" class="flex flex-row w-full items-center" style="display: none;">
        <input type="text" id="{{$field ?? ''}}" name="{{($field ?? '') . '[en]'}}"
               class="p-3 h-12 border border-gray-300 rounded-l mt-1 w-full"
               value="{{$model->getTranslation($field, 'en')}}">
        <button class="px-3 h-12 bg-gray-200 rounded-r hover:bg-gray-300 mt-1" type="button" id="{{$field}}_en_button">En</button>
    </div>
    <script>
        $('#{{$field}}_en_button').on('click', function () {
            $('#{{$field}}_en_input').hide();
            $('#{{$field}}_ar_input').show();
        });
        $('#{{$field}}_ar_button').on('click', function () {
            $('#{{$field}}_ar_input').hide();
            $('#{{$field}}_en_input').show();
        });
    </script>
@else
    <input type="text" id="{{$field ?? ''}}" name="{{$field ?? ''}}"
           class="p-3 h-12 border border-gray-300 rounded mt-1 w-full"
           value="{{$model->$field}}">
@endif

