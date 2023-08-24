<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Article Statistics') }}
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
                            <form method="get" action="{{route('statistics.article')}}" class="ui form">
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
                                                    <a href="javascript:void(0);" class="inline-flex items-center px-4 py-2 bg-blue-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-600 active:bg-blue-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 h-12" onclick="$('#download_form').submit();"> <div class="flex flex-row space-x-4 rtl:space-x-reverse"><div>تنزيل البيانات</div><em class="fa fa-download"></em></div></a>
                                                </div>
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
                                    {{ $articles->count() }}
                                    مقال تم تقييمهم في الفترة من
                                    {{ request('from', now()->firstOfMonth()->subMonth()->toDateString()) }}
                                    وحتى
                                    {{ request('to', now()->toDateString()) }}
                                </h4>
                            </div>
                            <div class="ui grid">
                                <div class="ui basic segment">
                                    <h3 class="ui center aligned horizontal divider header">المقالات التي تم تقييمها حسب الموضوع</h3>
                                    <canvas id="canvas_topic" style="min-height:500px;"></canvas>
                                </div>
                            </div>
                            <div class="ui grid">
                                <div class="ui basic segment">
                                    <h3 class="ui center aligned horizontal divider header">المقالات التي تم تقييمها حسب النوع</h3>
                                    <canvas id="canvas_type" style="min-height:500px;"></canvas>
                                </div>
                            </div>
                            @foreach($questions as $key => $question)
                                <div class="ui grid">
                                    <br>
                                    <div class="ui basic segment">
                                        <h3 class="ui center aligned horizontal divider header">{{ $loop->index + 1 }} - {{ $key }}</h3>
                                        <canvas id="canvas_{{ $loop->index }}" style="min-height:500px;"></canvas>
                                    </div>
                                    <br>
                                </div>
                            @endforeach
                        </div>
                        <form id="download_form" action="{{route('statistics.article.download')}}" method="POST">
                            @csrf
                            @method('post')
                            <input id="from_download" type="hidden" name="from" value="{{request('from', now()->firstOfMonth()->subMonth()->toDateString())}}" />
                            <input id="to_download" type="hidden" name="to" value="{{request('to', now()->toDateString())}}" />
                        </form>
                        <br><br>
                        <script type="text/javascript">
                            $('#from').on('change', function () {
                                $('#from_download').val($('#from').val())
                            });
                            $('#to').on('change', function () {
                                $('#to_download').val($('#to').val())
                            });
                            window.chartColors = {
                                red: 'rgb(176, 70, 59)',
                                orange: 'rgb(255, 159, 64)',
                                yellow: 'rgb(255, 205, 86)',
                                green: 'rgb(39, 174, 96)',
                                blue: 'rgb(54, 162, 235)',
                                purple: 'rgb(153, 102, 255)',
                                grey: 'rgb(201, 203, 207)'
                            };

                            const colors = [
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                                window.chartColors.green,
                                window.chartColors.blue,
                                window.chartColors.red,
                                window.chartColors.orange,
                                window.chartColors.yellow,
                                window.chartColors.green,
                                window.chartColors.blue,
                            ];

                            @foreach($questions as $question => $options)
                            const barChartData_{{$loop->index}} = {
                                labels: [
                                    @foreach($publishers as $publisher)
                                    '{{$publisher}}',
                                    @endforeach
                                ],
                                datasets: [
                                    @foreach($options as $option => $publishersCount)
                                    {
                                        label: '{{ $option }}',
                                        data: [
                                            @foreach($publishers as $publisher)
                                            {{ data_get($publishersCount, $publisher, 0) }},
                                            @endforeach
                                        ],
                                        backgroundColor: colors[{{ $loop->index }}],
                                    },
                                    @endforeach
                                ]
                            };
                            @endforeach

                            const barChartData_type = {
                                labels: [
                                    @foreach($types as $type => $count)
                                    '{{ $type }}',
                                    @endforeach
                                ],
                                datasets: [{
                                    data: [
                                        @foreach($types as $type => $count)
                                        '{{ $count }}',
                                        @endforeach
                                    ],
                                    backgroundColor: colors,
                                    label:'Article Types'
                                }]
                            };

                            const barChartData_topic = {
                                labels: [
                                    @foreach($topics as $topic => $count)
                                    '{{ $topic }}',
                                    @endforeach
                                ],
                                datasets: [{
                                    data: [
                                        @foreach($topics as $topic => $count)
                                        '{{ $count }}',
                                        @endforeach
                                    ],
                                    backgroundColor: colors,
                                    label: 'Article Topics'
                                }]
                            };

                            window.onload = function() {
                                @foreach($questions as $question => $options)
                                const ctx_{{ $loop->index }} = document.getElementById('canvas_{{ $loop->index }}').getContext('2d');
                                window.Bar_{{ $loop->index }} = new Chart(ctx_{{ $loop->index }}, {
                                    type: 'bar',
                                    data: barChartData_{{ $loop->index }},
                                    options: {
                                        title: {
                                            display: false,
                                            text: '{{ $question }}'
                                        },
                                        tooltips: {
                                            mode: 'index',
                                            intersect: false
                                        },
                                        responsive: true,
                                        scales: {
                                            xAxes: [{
                                                stacked: true,
                                            }],
                                            yAxes: [{
                                                stacked: true
                                            }]
                                        }
                                    }
                                });
                                @endforeach

                                const ctx_type = document.getElementById('canvas_type').getContext('2d');
                                window.Bar_type = new Chart(ctx_type, {
                                    type: 'pie',
                                    data: barChartData_type,
                                    options: {
                                        responsive: true,
                                    }
                                });
                                const ctx_topic = document.getElementById('canvas_topic').getContext('2d');
                                window.Bar_topic = new Chart(ctx_topic, {
                                    type: 'pie',
                                    data: barChartData_topic,
                                    options: {
                                        responsive: true,
                                    }
                                });
                            };
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
