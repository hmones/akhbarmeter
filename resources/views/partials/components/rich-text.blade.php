<label for="{{$id}}" class="text-sm">
    {{$label}}
</label>
<textarea name="{{$name}}"
          id="{{$id}}"
          cols="30"
          rows="{{$rows ?? 2}}"
          class="p-3 border border-gray-300 rounded mt-1 w-full text-lg">{{$value}}</textarea>
