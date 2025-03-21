@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.home.fake.header')" :description="translate('pages.home.fake.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.home.fake.header')" :description="translate('pages.home.fake.description')"/>
        <div class="container">
            <div class="flex flex-row mb-10 overflow-scroll h-fit" style="overflow-y:hidden">
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
            <form action="{{ route('fake.news') }}" method="GET" class="flex gap-4" dir="{{ app()->getLocale() === 'ar' ? 'rtl' : 'ltr' }}">
                <select name="subType" class="rounded-md" id="typeSelect">
                    <option value="">{{ translate('pages.topics.allTypes') }}</option>
                    @foreach(\App\Models\Topic::FAKE_NEWS_SUB_TYPES as $value => $label)
                        <option value="{{ $value }}" {{ request('subType') === $value ? 'selected' : '' }}>
                            {{ translate("pages.topics.fakeNews.subType.$value") }}
                        </option>
                    @endforeach
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
@endsection
