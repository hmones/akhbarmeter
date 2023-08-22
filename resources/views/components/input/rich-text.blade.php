@props(['id', 'label' => null, 'name', 'value' => null, 'placeholder' => null])

@if($label)
    <label for="{{$id}}" class="text-sm">{{$label}}</label>
@endif
<textarea id="{{$id}}" name="{{$name}}" class="hidden">{!! $value !!}</textarea>
<div id="editor_{{$id}}">{!! $value !!}</div>

<script>
    window['editor_{{$id}}'] = (new Quill('#editor_{{$id}}', {
        theme: 'snow',
        placeholder: 'من فضلك أدخل النص ...',
        tabsize: 2,
        modules: {
            toolbar: [['bold', 'italic'], ['link', 'image'], ['clean'], [{ 'direction': 'rtl' }]]
        }
    }))
    window['editor_{{$id}}'].on('text-change', function () {
        $('#{{$id}}').html($('#editor_{{$id}} .ql-editor').html())
    });
    window['editor_{{$id}}'].format('direction', 'rtl');
    window['editor_{{$id}}'].format('align', 'right');
</script>
