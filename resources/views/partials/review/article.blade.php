<div class="text-xl text-semibold mb-4">Article</div>
<div class="flex flex-row items-center space-x-4">
    <em class="fa fa-eye"></em>
    <div id="viewSwitchButton" class="text-blue-700 cursor-pointer">Switch between article's edit and view modes</div>
</div>
<div class="my-4" id="articleIframe" style="display: none;">
    <iframe title="Article view on as on the publisher's website" src="{{$article->url}}" class="w-full h-[70vh]" allow referrerpolicy="no-referrer"></iframe>
</div>
<div class="my-4" id="articleForm">
    <div class="flex flex-col space-y-4">
        <input type="hidden" name="review[article_id]" value="{{$article->id}}">
        <input type="hidden" name="review[user_id]" value="{{auth()?->id()}}">
        <div class="flex flex-row space-x-4">
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'Publisher',
                        'id' => 'publisher',
                        'value' => $article->publisher?->name
                    ])
            </div>
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'id' => 'articleAuthor',
                        'label' => 'Author',
                        'value' => $article->author
                    ])
            </div>
        </div>
        <div class="flex flex-row space-x-4">
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'Topic',
                        'id' => 'articleTopic',
                        'value' => $article->topic?->title
                    ])
            </div>
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'Type',
                        'id' => 'articleType',
                        'value' => $article->type?->title
                    ])
            </div>
        </div>

        <div class="flex flex-col">
            @include('partials.components.text-input', [
                    'id' => 'articleTitle',
                    'label' => 'Title',
                    'name' => 'article[title]',
                    'value' => $article->title
                    ])
        </div>
        <div class="flex flex-col">
            <label for="image" class="text-sm">Image</label>
            @if($article->image)
                <img class="mt-2 cursor-pointer" src="/storage/{{$article->image}}"
                     alt="{{$article->title}}" onclick="$('#image').click()">
            @else
                <div class="flex rounded-lg w-48 h-48 justify-center items-center
                mt-2 border-dashed border-2 border-gray-200 cursor-pointer" onclick="$('#image').click()">
                    <em class="fa fa-3x fa-image text-gray-200"></em>
                </div>
            @endif
            <input id="image" class="hidden" type="file" name="article[image]" accept="image/*" value="">
        </div>
        <div class="flex flex-col">
            <label for="content" class="text-sm">Content</label>
            <textarea id="content" name="article[content]" class="hidden">{!! $article->content !!}</textarea>
            <div id="toolbar" class="flex flex-row items-center space-x-2">
                <button class="ql-bold"></button>
                <button class="ql-italic"></button>
                <button class="ql-underline"></button>
                <button class="ql-strike"></button>
                <button class="ql-script" value="sub"></button>
                <button class="ql-script" value="super"></button>
                <button class="ql-indent" value="-1"></button>
                <button class="ql-indent" value="+1"></button>
                <button class="ql-direction" value="rtl"></button>
                <button class="ql-list" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <button id="profButton" type="button" class="custom-editor-button">احترافية</button>
                <button id="credButton" type="button" class="custom-editor-button">مصداقية</button>
                <button id="hrButton" type="button" class="custom-editor-button">حقوق الإنسان</button>
            </div>
            <div id="contentEditor">{!! $article->content !!}</div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endpush
<style>
    button.custom-editor-button {
        color: white !important;
        width: fit-content !important;
        padding: 5px 10px !important;
        height: fit-content !important;
        border-radius: 5px;
    }
    #hrButton {
        background-color: rgb(239 68 68);
    }
    #credButton {
        background-color: rgb(249 115 22);
    }
    #profButton {
        background-color: rgb(59 130 246);
    }

</style>
<script>
    $('#viewSwitchButton').on('click', function () {
        $('#articleIframe').toggle()
        $('#articleForm').toggle()
    })

    var editor = new Quill('#contentEditor', {
        theme: 'snow',
        placeholder: 'من فضلك أدخل النص ...',
        tabsize: 2,
        modules: {
            toolbar: '#toolbar'
        }
    });

    editor.on('text-change', function () {
        $('#content').html($('#contentEditor .ql-editor').html())
    })

    function replaceSelectionWithAnchorTag(colorClass, toolTip) {
        var highlight = window.getSelection();
        var range = highlight.getRangeAt(0);
        var spn = document.createElement('a');
        spn.innerHTML = highlight;
        spn.className = colorClass + ' border-dotted border-b-2 border-gray-500';
        spn.href = '#evaluation';
        spn.setAttribute('data-tooltip', toolTip);
        spn.setAttribute('data-inverted', '');
        range.deleteContents();
        range.insertNode(spn);
        $('#content').html($('#contentEditor .ql-editor').html())
    }

    $('#hrButton').click(() => replaceSelectionWithAnchorTag('text-red-500', '{{translate("page.view.cat3")}}'));
    $('#credButton').click(() => replaceSelectionWithAnchorTag('text-orange-500', '{{translate("page.view.cat2")}}'));
    $('#profButton').click(() => replaceSelectionWithAnchorTag('text-blue-500', '{{translate("page.view.cat1")}}'));
</script>

