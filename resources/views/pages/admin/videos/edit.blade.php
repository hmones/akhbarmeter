@extends('layouts.default')
@section('content')
    <div class="">
        <div class="container mt-20">
            <h3 class="text-3xl">
                <a href="{{route('admin.index')}}">Dashboard</a>
                <span class="text-gray-400"> > </span>
                <a href="{{route('admin.videos.index')}}">Videos</a>
                <span class="text-gray-400"> > </span>
                <a href="javascript:void(0)">{{$model->id ?? 'New'}}</a>
            </h3>
        </div>
        <div class="container my-10">
            <form action="{{$model->id ? route('admin.videos.update', $model->id) : route('admin.videos.store')}}"
                  method="post"
                  class="flex flex-col space-y-4 items-start align-top">
                @csrf
                @method($model->id ? 'patch' : 'post')
                @section('scripts')
                    @if(in_array('rich', $model->editableFields))
                        {{-- Documentation: https://www.tiny.cloud/docs/tinymce/6/ --}}
                        <script
                            src="https://cdn.tiny.cloud/1/omsc4vrdqsgwxhpb6pt278a82u6egs2ezc4xdo11ep0uur6m/tinymce/6/tinymce.min.js"
                            referrerpolicy="origin"></script>
                        <script>
                            tinymce.init({
                                selector: 'textarea',
                                width: '100%',
                                plugins: [
                                    'a11ychecker', 'advlist', 'advcode', 'advtable', 'autolink', 'checklist', 'export',
                                    'lists', 'link', 'image', 'charmap', 'preview', 'anchor', 'searchreplace', 'visualblocks',
                                    'powerpaste', 'fullscreen', 'formatpainter', 'insertdatetime', 'media', 'table', 'help', 'wordcount'

                                ],

                                toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                                    'alignleft aligncenter alignright alignjustify | ' +
                                    'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
                            });
                        </script>
                    @endif
                    @if(in_array('tags', $model->editableFields))
                        {{--
                            Documentation: https://github.com/lekoala/bootstrap5-tags
                            And https://www.cssscript.com/tags-input-bootstrap-5/
                         --}}
                        <script type="module">
                            import Tags from "{{asset('js/tags.min.js')}}";

                            Tags.init("select[multiple]", {
                                allowNew: true,
                                showAllSuggestions: true,
                                badgeStyle: "primary",
                                allowClear: true,
                                separator: ',',
                                clearLabel: "x",
                                searchLabel: "Type a value",
                                valueField: "value",
                                labelField: "label",
                                fullWidth: true,
                                baseClass: "bg-blue-700 text-white",
                                addOnBlur: true,
                            });
                        </script>
                    @endif
                @endsection
                @foreach($model->editableFields as $field => $type)
                    <div class="flex flex-col items-start space-y-4 w-1/2">
                        @switch($type)
                            @case('rich')
                                <label for="{{$field}}" class="text-sm">
                                    {{Str::title($field)}}
                                </label>
                                <textarea name="{{$field}}"
                                          id="{{$field}}"
                                          cols="30"
                                          rows="10"
                                          class="p-3 border border-gray-300
                                          rounded mt-1 w-full">{{$model->$field}}</textarea>
                                @break
                            @case('tags')
                                <label for="{{$field}}" class="text-sm">{{Str::title($field)}}</label>
                                <select id="{{$field}}" class="form-select" name="{{$field . '[]'}}" multiple>
                                    <option selected disabled hidden value="">Choose a tag...</option>
                                    @foreach($model->$field ?? [] as $record)
                                        <option value="{{$record}}" selected>{{$record}}</option>
                                    @endforeach
                                </select>
                                <div class="invalid-feedback">Please select a valid tag.</div>
                                @break
                            @default
                                @include('partials.components.text-input', [
                                    'label' => Str::title($field),
                                    'name'  => $field,
                                    'value' => $model->$field,
                                ])
                        @endswitch
                    </div>
                @endforeach
                <div class="pt-10">
                    <button class="bg-blue-600 py-2 px-8 rounded text-white hover:bg-blue-800" type="submit">
                        {{$model->id ? 'Update' : 'Create'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
