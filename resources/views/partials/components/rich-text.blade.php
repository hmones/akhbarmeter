<label for="{{$field}}" class="text-sm">
    {{Str::title($field)}}
</label>

@if(in_array($field, $model->translatable ?? []))
    <div id="{{$field}}_ar_input" class="flex flex-row w-full items-start">
        <textarea name="{{$field . '[ar]'}}"
                  id="{{$field}}"
                  cols="30"
                  rows="10"
                  class="p-3 border border-gray-300
              rounded mt-1 w-full">{{$model->getTranslation($field, 'ar')}}</textarea>
        <button class="px-3 h-12 bg-gray-200 rounded-r hover:bg-gray-300 mt-1" type="button" id="{{$field}}_ar_button">Ar</button>
    </div>
    <div id="{{$field}}_en_input" class="flex flex-row w-full items-start" style="display: none;">
        <textarea name="{{$field . '[en]'}}"
                  id="{{$field}}"
                  cols="30"
                  rows="10"
                  class="p-3 border border-gray-300
              rounded mt-1 w-full">{{$model->getTranslation($field, 'en')}}</textarea>
        <button type="button" class="px-3 h-12 bg-gray-200 rounded-r hover:bg-gray-300 mt-1" id="{{$field}}_en_button">En</button>
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
    <textarea name="{{$field}}"
              id="{{$field}}"
              cols="30"
              rows="10"
              class="p-3 border border-gray-300
              rounded mt-1 w-full">{{$model->$field}}</textarea>
@endif
