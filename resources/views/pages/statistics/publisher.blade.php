<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Publisher Statistics') }}
        </h2>
    </x-slot>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.bundle.min.js"></script>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl text-gray-500 mt-4 mb-8" dir="rtl">
                        <br>
                        <div class="ui container">
                            <form method="get" action="{{route('statistics.publisher')}}" class="ui form">
                                <div>
                                    <div class="ui form">
                                        <h3 class="mb-8">
                                            الفترة الزمنية
                                        </h3>
                                        <div class="flex flex-col space-y-4">
                                            <div class="field">
                                                <div class="flex flex-row space-x-6 rtl:space-x-reverse items-center">
                                                    <div class="flex w-1/4 items-center space-x-4 rtl:space-x-reverse items-center">
                                                        <x-input.date label="من" id="from" name="from" min="2014-01-01" max="2100-01-01" value="{{request('from', now()->firstOfMonth()->subMonth()->toDateString())}}"/>
                                                    </div>
                                                    <div class="flex w-1/4 items-center space-x-4 rtl:space-x-reverse items-center">
                                                        <x-input.date label="إلى" id="to" name="to" min="2014-01-01" max="2100-01-01" value="{{request('to', now()->toDateString())}}"/>
                                                    </div>
                                                    <x-primary-button class="h-12"> <div class="flex flex-row space-x-4 rtl:space-x-reverse"><div>ابحث</div><em class="fa fa-search"></em></div></x-primary-button>
                                                </div>
                                            </div>
                                            <div class="flex flex-row space-x-6 rtl:space-x-reverse">

                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                </div>
                            </form>
                        </div>
                        <div class="ui container">
                            <div class="ui center aligned basic segment">
                                <h4 class="ui center aligned horizontal divider header"> <i class="ui clock icon"></i> عرض الاحصائيات
                                    لـ
                                    {{App\Models\Publisher::whereActive(1)->count()}}
                                    جرائد تم تقييمهم في الفترة من
                                    {{request('from', now()->firstOfMonth()->subMonth()->toDateString())}}
                                    وحتى
                                    {{request('to', now()->toDateString())}}
                                </h4>
                            </div>

                            @foreach($publishers as $key => $publisher)
                                <div class="ui grid">
                                    <br>
                                    <div class="ui basic segment">
                                        <h3 class="ui center aligned horizontal divider header">{{$key + 1}} - {{$publisher->name}}</h3>
                                        <canvas id="canvas_{{$key}}" style="min-height:500px;"></canvas>
                                    </div>
                                    <br>
                                </div>
                            @endforeach

                        </div>
                        <br><br>

                        <script type="text/javascript">
                            window.chartColors = {
                                red: 'rgb(176, 70, 59)',
                                orange: 'rgb(255, 159, 64)',
                                yellow: 'rgb(255, 205, 86)',
                                green: 'rgb(39, 174, 96)',
                                blue: 'rgb(54, 162, 235)',
                                purple: 'rgb(153, 102, 255)',
                                grey: 'rgb(201, 203, 207)'
                            };

                            @foreach($publishers as $key => $publisher)
                                const barChartData_{{$key}} = {
                                    labels: [
                                        @foreach($publisher->scores as $score)
                                            '{{\Illuminate\Support\Carbon::parse($score->to)->format("d F Y")}}',
                                        @endforeach
                                    ],
                                    datasets: [
                                        {
                                            label: 'إحصائيات الناشر',
                                            borderColor: window.chartColors.purple,
                                            backgroundColor: window.chartColors.purple,
                                            borderWidth: 3,
                                            fill: false,
                                            data: [
                                                @foreach($publisher->scores as $score)
                                                    {{$score->score}},
                                                @endforeach
                                            ]
                                        },
                                        {
                                            label: 'إحصائيات الناشر في مجال الإجترافية',
                                            borderColor: window.chartColors.blue,
                                            backgroundColor: window.chartColors.blue,
                                            borderWidth: 3,
                                            fill: false,
                                            data: [
                                                @foreach($publisher->scores as $score)
                                                    {{$score->score_1}},
                                                @endforeach
                                            ]
                                        },
                                        {
                                            label: 'إحصائيات الناشر في مجال المصداقية',
                                            borderColor: window.chartColors.green,
                                            backgroundColor: window.chartColors.green,
                                            borderWidth: 3,
                                            fill: false,
                                            data: [
                                                @foreach($publisher->scores as $score)
                                                    {{$score->score_2}},
                                                @endforeach
                                            ]
                                        },
                                        {
                                            label: 'إحصائيات الناشر في مجال احترام حقوق الإنسان',
                                            borderColor: window.chartColors.red,
                                            backgroundColor: window.chartColors.red,
                                            borderWidth: 3,
                                            fill: false,
                                            data: [
                                                @foreach($publisher->scores as $score)
                                                    {{$score->score_3}},
                                                @endforeach
                                            ]
                                        }

                                    ]
                                };

                            const ctx_{{$key}} = document.getElementById('canvas_{{$key}}').getContext('2d');
                            window.Bar_{{$key}} = new Chart(ctx_{{$key}}, {
                                type: 'line',
                                data: barChartData_{{$key}},
                                options: {
                                    title: {
                                        display: false,
                                        text: '{{$publisher->name}}'
                                    },
                                    tooltips: {
                                        mode: 'index',
                                        intersect: false
                                    },
                                    responsive: true,
                                    scales: {
                                        xAxes: [{
                                            stacked: false,
                                        }],
                                        yAxes: [{
                                            stacked: false
                                        }]
                                    }
                                }
                            });
                            @endforeach
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
