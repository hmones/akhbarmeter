@extends('layouts.default')

@section('seo')
    <x-seo :title="$publisher->name" :description="strip_tags($publisher->description)" :image="Storage::url($publisher->image)" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full">
        <x-page-header :headline="$publisher->name" :description="$publisher->description"/>
        <div class="flex flex-col lg:flex-row-reverse p-4 rounded-lg bg-gray-50 my-4 space-y-4 lg:space-x-6 lg:space-y-0 rtl:space-x-reverse">
            <div class="lg:w-4/5 lg:px-4">
                <canvas id="chart"></canvas>
            </div>
            <div class="flex lg:flex-col lg:w-1/5 space-x-3 lg:space-y-3 lg:space-x-0 rtl:space-x-reverse">
                <img class="flex flex-col rounded-lg w-28 lg:w-fit" src="{{Storage::url($publisher->image)}}" alt="{{$publisher->name}}"/>
                <div class="flex flex-col space-y-3">
                    <div class="text-xs leading-4 font-medium">{{$publisher->hashtags}}</div>
                    <div class="text-xl leading-8 font-semibold">
                        {{translate('components.publisher.card.rank')}}
                        {{$publisher->scores()->lastMonth()->first()?->rank ?? 1}}</div>
                    <div class="text-base leading-6 font-normal">
                        {{translate('components.publisher.card.month')}}
                        {{$publisher->scores()->lastMonth()->first()?->score ?? 100}}%
                    </div>
                    <div class="text-base leading-6 font-normal">
                        {{translate('components.publisher.card.week')}}
                        {{$publisher->scores()->lastWeek()->first()?->score ??100}}%
                    </div>
                </div>
            </div>
        </div>
        <x-page-header :headline="translate('pages.publisher.header') . $publisher->name"
                       :description="translate('pages.publisher.description')"
                       hideOnMobile="true"/>

        <div class="container mb-10 space-y-10">

                @foreach($publisher->articles()->latest()->whereActive(1)->limit(9)->get()->chunk(3) as $articleRow)
                <div
                    class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                    @foreach($articleRow as $article)
                        <div class="flex flex-col xl:flex-row w-full xl:w-1/3 px-2">
                            <x-cards.article :article="$article" showTotalScore="false"/>
                        </div>
                    @endforeach
                </div>
                @endforeach

        </div>
    </div>
    <script>
        const APP_LOCALE = '{{session('locale')}}'
        const MONTHS = {
            en: [
                'Jan',
                'Feb',
                'Mar',
                'Apr',
                'May',
                'Jun',
                'Jul',
                'Aug',
                'Sep',
                'Oct',
                'Nov',
                'Dec'
            ],
            ar: [
                'يناير',
                'فبراير',
                'مارس',
                'أبريل',
                'مايو',
                'يونيو',
                'يوليو',
                'أغسطس',
                'سبتمبر',
                'أكتوبر',
                'نوفمبر',
                'ديسمبر',
            ]
        };

        const DATA_COUNT = 12;
        const labels = APP_LOCALE === 'en' ? MONTHS.en : MONTHS.ar;
        const barThickness = 25;
        const borderRadius = 10;
        const data = {
            labels: labels,
            datasets: [
                {
                    label: '{{translate('general.human-rights')}}',
                    data: {{json_encode($data->pluck('score_3')->toArray())}},
                    barThickness: barThickness,
                    borderRadius: borderRadius,
                    backgroundColor: '#1E3A8A',
                },
                {
                    label: '{{translate('general.credibility')}}',
                    data: {{json_encode($data->pluck('score_2')->toArray())}},
                    barThickness: barThickness,
                    borderRadius: borderRadius,
                    backgroundColor: '#1D4ED8',
                },
                {
                    label: '{{translate('general.professionalism')}}',
                    data: {{json_encode($data->pluck('score_1')->toArray())}},
                    barThickness: barThickness,
                    borderRadius: borderRadius,
                    backgroundColor: '#3B82F6',
                },
                {
                    label: '{{translate('pages.publisher.average')}}',
                    data: {{json_encode($data->pluck('score')->toArray())}},
                    barThickness: barThickness,
                    borderRadius: borderRadius,
                    backgroundColor: '#93C5FD',
                },
            ]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                plugins: {
                    title: {
                        display: false,
                        text: 'Publisher Historical Rating'
                    },
                    legend: {
                        align: 'end',
                        labels: {
                            boxWidth: 10,
                            boxHeight: 10,
                            borderRadius: 20
                        }
                    }
                },
                responsive: true,
                scales: {
                    x: {
                        stacked: true,
                        grid: {
                            display: false,
                        }
                    },
                    y: {
                        stacked: true
                    }
                },
                locale: '{{session('locale') ?? 'ar'}}'
            }
        };

        const chart = new Chart($('#chart'), config);

    </script>
@endsection
@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.1.1/chart.umd.min.js"
            integrity="sha512-RnIvaWVgsDUVriCOO7ZbDOwPqBY1kdE8KJFmJbCSFTI+a+/s+B1maHN513SFhg1QwAJdSKbF8t2Obb8MIcTwxA=="
            crossorigin="anonymous" referrerpolicy="no-referrer"></script>
@endpush
