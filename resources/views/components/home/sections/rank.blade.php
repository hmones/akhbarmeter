@props(['best', 'worst', 'bestThree', 'worstThree'])

<section id="monthlyRanking">
    <x-page-header headline="This month ranking"
                   description="Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ipsa libero labore natus atque, ducimus sed."/>
    <div class="container flex flex-row space-x-6 w-full items-center justify-center">
        <div
            class="flex flex-col-reverse lg:flex-row w-1/2 lg:space-x-4 justify-between items-center">
            @foreach($bestThree ?? [] as $publisher)
                    <x-home.rank-small :publisher="$publisher"/>
            @endforeach
            <div class="mb-4 lg:mb-0">
                <x-home.rank :publisher="$best"/>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row w-1/2 lg:space-x-4 justify-between items-center">
            <div class="mb-4 lg:mb-0">
                <x-home.rank :publisher="$worst" title="Worst last month"/>
            </div>
            @foreach($worstThree ?? [] as $publisher)
                <x-home.rank-small :publisher="$publisher"/>
            @endforeach
        </div>
    </div>
</section>
