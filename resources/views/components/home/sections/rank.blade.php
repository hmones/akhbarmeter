@props(['best', 'worst', 'bestThree', 'worstThree'])

<section id="monthlyRanking">
    <x-page-header :headline="translate('pages.home.ranking.header')"
                   :description="translate('pages.home.ranking.description')"/>
    <div class="container flex flex-row space-x-6 w-full items-center justify-center">
        <div
            class="flex flex-col-reverse lg:flex-row w-1/2 lg:space-x-4 justify-between items-center">
            @foreach($bestThree ?? [] as $score)
                    <x-home.rank-small :score="$score"/>
            @endforeach
            <div class="mb-4 lg:mb-0">
                <x-home.rank :score="$best" :title="translate('components.home.rank.best')"/>
            </div>
        </div>
        <div class="flex flex-col lg:flex-row w-1/2 lg:space-x-4 justify-between items-center">
            <div class="mb-4 lg:mb-0">
                <x-home.rank :score="$worst" :title="translate('components.home.rank.worst')"/>
            </div>
            @foreach($worstThree ?? [] as $score)
                <x-home.rank-small :score="$score"/>
            @endforeach
        </div>
    </div>
</section>
