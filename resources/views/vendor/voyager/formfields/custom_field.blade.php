@php
    $values = $dataTypeContent->{$row->field};
    if (is_string($values)) { $values = json_decode($values, true); }
    if (empty($values)) { $values = array(); }
@endphp
<div class="custom-field is-field-{{camel_case($row->field)}}">
    You can do anything here. Good luck !
    PS: Use $values to get te actual data, in form of an array.
</div>
@php $dataTypeContent->{$row->field} = $values; @endphp
