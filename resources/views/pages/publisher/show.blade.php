@extends('layouts.default')
@section('content')
    <x-page-header :headline="$publisher->name" :description="$publisher->description"/>
    <div class="container">
        <div class="flex flex-col lg:flex-row-reverse p-4 rounded-lg bg-gray-50 my-4 space-y-4 lg:space-x-6 lg:space-y-0">
            <div class="lg:w-4/5 lg:px-4">
                <canvas id="chart"></canvas>
            </div>
            <div class="flex lg:flex-col lg:w-1/5 space-x-3 lg:space-y-3 lg:space-x-0">
                <img class="flex flex-col rounded-lg" src="{{Storage::url($publisher->image)}}" alt="{{$publisher->name}}"/>
                <div class="flex flex-col space-y-3">
                    <div class="text-xs leading-4 font-medium">{{$publisher->hashtags}}</div>
                    <div class="text-xl leading-8 font-semibold">Rank:
                        No. {{$publisher->scores()->lastMonth()->first()?->rank ?? 1}}</div>
                    <div class="text-base leading-6 font-normal">Last month
                        Rating: {{$publisher->scores()->lastMonth()->first()?->score ?? 100}}%
                    </div>
                    <div class="text-base leading-6 font-normal">Last week
                        Rating: {{$publisher->scores()->lastWeek()->first()?->score ??100}}%
                    </div>
                    <div class="text-base leading-6 font-medium">
                        Small Disclaimer about the way we calculate these numbers.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <x-page-header headline="Latest Reviews from {{$publisher->name}}"
                   description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."
    hideOnMobile="true"/>

    <div class="container mb-10 space-y-10">
        <div
            class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
            @foreach($publisher->articles()->latest()->whereActive(1)->limit(9)->get() as $article)
                <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                    @include('partials.article-card', [
                        'article' => $article,
                        'title'   => $article->title,
                        'time'    => $article->created_at->diffForHumans(),
                        'route'   => 'articles.index',
                        'tags'    => array_filter(preg_split('/[#\s]/', $article->publisher->hashtags)),
                        'avatar'  => $article->image ? Storage::url($article->image) : asset('images/placeholders/article.png'),
                        'icon'    => $article->publisher->image ? Storage::url($article->publisher->image) : asset('images/placeholders/publisher.png'),
                        'show'    => route('articles.show', $article->id),
                        'showTotalScore' => false
                    ])
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
        const data = {
            labels: labels,
            datasets: [
                {
                    label: 'Human Rights',
                    data: {{json_encode($data->pluck('score_3')->toArray())}},
                    backgroundColor: '#1E3A8A',
                },
                {
                    label: 'Credibility',
                    data: {{json_encode($data->pluck('score_2')->toArray())}},
                    backgroundColor: '#1D4ED8',
                },
                {
                    label: 'Professionalism',
                    data: {{json_encode($data->pluck('score_1')->toArray())}},
                    backgroundColor: '#3B82F6',
                },
                {
                    label: 'Average Rate',
                    data: {{json_encode($data->pluck('score')->toArray())}},
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
                locale: '{{session('locale')}}'
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
