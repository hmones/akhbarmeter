<div class="text-xl text-semibold mb-4">الخبر</div>
<div class="flex flex-row items-center space-x-4 rtl:space-x-reverse">
    <em class="fa fa-eye"></em>
    <div id="viewSwitchButton" class="text-blue-700 cursor-pointer">انتقل ما بين تصفح الخبر علي موقعنا أو موقع الجريدة</div>
</div>
<div class="my-4" id="articleIframe" style="display: none;">
    <iframe title="Article view on as on the publisher's website" src="{{$article->url}}" class="w-full h-[70vh]" allow referrerpolicy="no-referrer"></iframe>
</div>
<div class="my-4" id="articleForm">
    <div class="flex flex-col space-y-4">
        <input type="hidden" name="review[article_id]" value="{{$article->id}}">
        <input type="hidden" name="review[user_id]" value="{{auth()?->id()}}">
        <div class="flex flex-col">
            @include('partials.components.text-input', [
                    'id' => 'articleTitle',
                    'label' => 'العنوان',
                    'name' => 'article[title]',
                    'value' => $article->title
                    ])
        </div>
        <div class="flex flex-col">
            <label for="content" class="text-sm">المحتوى</label>
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
                <button class="ql-list" value="ordered"></button>
                <button class="ql-list" value="bullet"></button>
                <button class="ql-image"></button>
                <button class="ql-video"></button>
                <button class="ql-clean"></button>
                <button id="profButton" type="button" class="ql-pro_link custom-editor-button">احترافية</button>
                <button id="credButton" type="button" class="ql-cred_link custom-editor-button">مصداقية</button>
                <button id="hrButton" type="button" class="ql-hr_link custom-editor-button">حقوق الإنسان</button>
            </div>
            <div id="contentEditor" class="min-h-[50vh] !text-lg">{!! $article->content !!}</div>
        </div>
        <div class="flex flex-col">
            <label for="image" class="text-sm">الصورة</label>
            <div id="image-preview" class="{{empty($article->image) ? "hidden" : ""}} flex">
                <img class="mt-2 cursor-pointer w-1/2" src="{{$article->image ? Storage::url($article->image) : ""}}"
                     alt="{{$article->title}}" onclick="$('#image').click()">
                <em class="fa fa-close ms-2 cursor-pointer" onclick="removeImage()"></em>
            </div>
            <div id="image-placeholder" class="{{empty($article->image) ? "" : "hidden"}}">
                <div class="flex rounded-lg w-48 h-48 justify-center items-center
                mt-2 border-dashed border-2 border-gray-200 cursor-pointer" onclick="$('#image').click()">
                    <em class="fa fa-3x fa-image text-gray-200"></em>
                </div>
            </div>
            <input id="image" class="hidden" type="file" name="article[image]" accept="image/*" value="">
        </div>
        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'الناشر',
                        'id' => 'publisher',
                        'value' => $article->publisher?->name
                    ])
            </div>
            <div class="flex flex-col w-1/2">
                @include('partials.components.text-input', [
                        'id' => 'articleAuthor',
                        'name' => 'article[author]',
                        'label' => 'الصحفي',
                        'value' => $article->author
                    ])
            </div>
        </div>
        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'الموضوع',
                        'id' => 'articleTopic',
                        'value' => $article->topic?->title
                    ])
            </div>
            <div class="flex flex-col w-1/2">
                @include('partials.components.disabled-input', [
                        'label' => 'النوع',
                        'id' => 'articleType',
                        'value' => $article->type?->title
                    ])
            </div>
        </div>
        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
            <div class="flex flex-col w-1/2">
                <x-input.date label="التاريخ" name="article[date]" id="articleDate" value="{{$article->date}}"/>
            </div>
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="{{ asset('js/quill-resize-module.min.js') }}"></script>
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
    #contentEditor.ql-editor {
        font-size: 25px;
    }
    .ql-editor {
        text-align: right;
        direction: rtl;
    }
</style>
<script>
    function removeImage() {
       $('#image-preview').addClass("hidden");
       $('#image-placeholder').removeClass("hidden");
       $('#image').val("");
    }

    $("#image").change(function () {
        if (this.files && this.files[0]) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $('#image-preview img').attr("src", e.target.result);
                $('#image-preview').removeClass("hidden")
                $('#image-placeholder').addClass("hidden");
            };
            reader.readAsDataURL(this.files[0]);
        }
    });

    $('#viewSwitchButton').on('click', function () {
        $('#articleIframe').toggle()
        $('#articleForm').toggle()
    })

    const Inline = Quill.import('blots/inline');

    class HrLink extends Inline {
        static create(value) {
            let node = super.create(value);
            node.setAttribute('href', '#evaluation');
            return node;
        }
    }

    HrLink.blotName = 'hr_link';
    HrLink.className = 'hr_link';
    HrLink.tagName = 'A';


    class CredLink extends Inline {
        static create(value) {
            let node = super.create(value);
            node.setAttribute('href', '#evaluation');
            return node;
        }
    }

    CredLink.blotName = 'cred_link';
    CredLink.className = 'cred_link';
    CredLink.tagName = 'A';


    class ProLink extends Inline {
        static create(value) {
            let node = super.create(value);
            node.setAttribute('href', '#evaluation');
            return node;
        }
    }

    ProLink.blotName = 'pro_link';
    ProLink.className = 'pro_link'
    ProLink.tagName = 'A';


    Quill.register({
        'formats/hr_link': HrLink,
        'formats/pro_link': ProLink,
        'formats/cred_link': CredLink
    });
    Quill.register("modules/resize", window.QuillResizeModule);

    var editor = new Quill('#contentEditor', {
        theme: 'snow',
        placeholder: 'من فضلك أدخل النص ...',
        tabsize: 2,
        modules: {
            toolbar: '#toolbar',
            resize: {
                locale: {
                    center: "center",
                },
            },
        }
    });

    editor.on('text-change', function () {
        $('#content').html($('#contentEditor .ql-editor').html())
    })
</script>

