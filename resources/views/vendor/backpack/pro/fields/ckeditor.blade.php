{{-- CKeditor --}}
@php
     $field['extra_plugins'] = isset($field['extra_plugins'])
        ? implode(',', array_merge(explode(',', $field['extra_plugins']), ['justify']))
        : "embed,widget,justify";
    $defaultOptions = [
        "language" => app()->getLocale(),
        "filebrowserBrowseUrl" => backpack_url('elfinder/ckeditor'),
        "extraPlugins" => $field['extra_plugins'],
        "embed_provider" => "//ckeditor.iframe.ly/api/oembed?url={url}&callback={callback}",
        "mediaEmbed"
    ];

    $field['options'] = array_merge($defaultOptions, $field['options'] ?? []);
@endphp

@include('crud::fields.inc.wrapper_start')
    <label>{!! $field['label'] !!}</label>
    @include('crud::fields.inc.translatable_icon')
    <textarea
        name="{{ $field['name'] }}"
        data-init-function="bpFieldInitCKEditorElement"
        data-options="{{ trim(json_encode($field['options'])) }}"
        bp-field-main-input
        @include('crud::fields.inc.attributes', ['default_class' => 'form-control'])
    	>{{ old_empty_or_null($field['name'], '') ??  $field['value'] ?? $field['default'] ?? '' }}</textarea>

    {{-- HINT --}}
    @if (isset($field['hint']))
        <p class="help-block">{!! $field['hint'] !!}</p>
    @endif
@include('crud::fields.inc.wrapper_end')


{{-- ########################################## --}}
{{-- Extra CSS and JS for this particular field --}}
{{-- If a field type is shown multiple times on a form, the CSS and JS will only be loaded once --}}

    {{-- FIELD JS - will be loaded in the after_scripts section --}}
    @push('crud_fields_scripts')
        @loadOnce('packages/ckeditor/ckeditor.js')
        @loadOnce('packages/ckeditor/adapters/jquery.js')
        @loadOnce('bpFieldInitCKEditorElement')
        <script>
            function bpFieldInitCKEditorElement(element) {

                element.on('CrudField:delete', function(e) {
                    if (typeof element.editor !== undefined) {
                        element.editor.destroy(true);
                    }
                });

                // trigger a new CKEditor
                element.ckeditor(element.data('options'));

                // trigger the change event on textarea when ckeditor changes
                element.editor.on('change', (evt, data) => {
                    element.trigger('change');
                });

                element.on('CrudField:disable', function(e) {
                    if (typeof element.editor !== undefined) {
                        element.editor.setReadOnly(true);
                    }
                });

                element.on('CrudField:enable', function(e) {
                    if (typeof element.editor !== undefined) {
                        element.editor.setReadOnly(false);
                    }
                });
            }
        </script>
        @endLoadOnce
    @endpush

{{-- End of Extra CSS and JS --}}
{{-- ########################################## --}}
