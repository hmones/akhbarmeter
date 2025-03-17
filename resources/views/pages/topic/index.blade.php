@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.topics.header')" :description="translate('pages.topics.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.topics.header')" :description="translate('pages.topics.description')"/>
        <div class="container">
            <div class="flex flex-row mb-10 overflow-scroll h-fit" style="overflow-y:hidden">
                @if(request()->has('tag'))
                    <a href="{{route('topics.index')}}" class="flex flex-row mx-2 px-2 h-fit rounded-5 text-sm mt-1.5">
                        <i class="fa fa-close"></i>
                    </a>
                @endif
                @foreach($tags as $tag)
                    <div class="flex flex-col min-w-fit">
                        <a href="{{ route('tags.index', ['name' => data_get($tag, 'name')]) }}" target="_blank"
                           class="flex flex-row mx-1 px-2 bg-gray-100 h-fit rounded-5 text-sm mt-1">
                            #{{ data_get($tag, 'name') }}
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
        <div class="container mb-6 p-6">
            <form action="{{ route('topics.index') }}" method="GET" class="flex gap-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <select name="type" class="rounded-md" id="typeSelect">
                    <option value="">{{ translate('pages.topics.allTypes') }}</option>
                    @foreach(\App\Models\Topic::TYPES as $value => $label)
                        @if($value !== 'fakeNews')
                            <option value="{{ $value }}" {{ request('type') === $value ? 'selected' : '' }}>
                                {{ translate("pages.topics.type.$value") }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <select name="subType" class="rounded-md {{ !in_array(request('type'), ['factSheet', 'explainer']) ? 'hidden' : '' }}" id="subTypeSelect">
                    <option value="">{{ translate('pages.topics.allSubTypes') }}</option>
                </select>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md">
                    {{ translate('pages.topics.types.applyFilter') }}
                </button>
            </form>
        </div>
        <div class="container mb-10 space-y-10">
            @foreach($topics->chunk(3) as $rowTopics)
                <div class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($rowTopics as $record)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                            <x-cards.topic :topic="$record" />
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
        <div class="container my-20 space-y-10" dir="ltr">
            {{$topics->appends(request()->except('page'))->links()}}
        </div>
    </div>
    <script>
        function updateSubTypes(selectedType) {
            const subTypeSelect = document.getElementById('subTypeSelect');
            if (!subTypeSelect) return;

            subTypeSelect.innerHTML = '<option value="">{{ translate("pages.topics.types.applyFilter") }}</option>';

            if (selectedType === 'factSheet') {
                subTypeSelect.classList.remove('hidden');
                subTypeSelect.innerHTML += `
                <option value="factSheetOnGender" {{ request('subType') === 'factSheetOnGender' ? 'selected' : '' }}>
                    {{ translate("pages.topics.subType.factSheetOnGender") }}
                </option>
                <option value="factSheetOnClimateChange" {{ request('subType') === 'factSheetOnClimateChange' ? 'selected' : '' }}>
                    {{ translate("pages.topics.subType.factSheetOnClimateChange") }}
                </option>
            `;
            } else if (selectedType === 'explainer') {
                subTypeSelect.classList.remove('hidden');
                subTypeSelect.innerHTML += `
                <option value="explainerOnGender" {{ request('subType') === 'explainerOnGender' ? 'selected' : '' }}>
                    {{ translate("pages.topics.subType.explainerOnGender") }}
                </option>
                <option value="explainerOnClimateChange" {{ request('subType') === 'explainerOnClimateChange' ? 'selected' : '' }}>
                    {{ translate("pages.topics.subType.explainerOnClimateChange") }}
                </option>
            `;
            } else {
                subTypeSelect.classList.add('hidden');
                subTypeSelect.value = '';
            }
        }

        updateSubTypes(document.getElementById('typeSelect').value);
        document.getElementById('typeSelect').addEventListener('change', function() {
            updateSubTypes(this.value);
        });
    </script>
@endsection
