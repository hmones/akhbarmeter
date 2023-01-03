@props(['id', 'label' => null, 'name', 'value' => null, 'placeholder' => null])

@if($label)
<label for="{{$id}}" class="text-sm">{{$label}}</label>
@endif
<input type="text" id="{{$id}}" name="{{$name}}"
       class="p-3 h-12 border border-gray-300 rounded mt-1 w-full text-gray-500"
       value="{{$value}}" placeholder="{{$placeholder}}" />
