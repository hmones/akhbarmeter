@props(['article', 'show' => null, 'showTotalScore' => true])
<div class="bg-gray-50 px-3 py-4">
    <div class="flex flex-col space-y-4">
        <div class="flex flex-row justify-between items-center">
            <div class="text-base leading-6 font-medium">
                {{translate('components.cards.article.rating.header')}}
            </div>
            @isset($show)
                <a href="{{$show}}" class="text-blue-500 text-xs  leading-4 font-semibold">
                    {{translate('components.cards.article.rating.link')}}
                </a>
            @endisset
        </div>
        <div class="flex flex-row">
            <x-label :label="$article->getLabel()"/>
        </div>
        @if($showTotalScore === true)
            <div class="flex flex-row justify-between items-center py-3 mt-0 border-b-2 border-solid border-gray-200">
                <div class="text-xs leading-4 font-medium tracking-wider uppercase">
                    {{translate('components.cards.article.rating.overall')}}
                </div>
                <x-rating score="{{$article->review?->score ?? 100}}"/>
            </div>
        @else
            <div class="flex flex-row justify-between items-center py-3 mt-0 border-b-2 border-solid border-gray-200">
                <div class="flex flex-col">
                    <div class="text-xs leading-4 font-medium tracking-wider uppercase">
                        {{translate('general.human-rights')}}
                    </div>
                    <div class="text-xs leading-4 font-normal">{{$article->getLabel(\App\Models\Question::HUMAN_RIGHTS_WEIGHT)->title}}</div>
                </div>
                <x-rating score="{{$article->review?->score_3 ?? 100}}"/>
            </div>
            <div class="flex flex-row justify-between items-center py-3 mt-0 border-b-2 border-solid border-gray-200">
                <div class="flex flex-col">
                    <div class="text-xs leading-4 font-medium tracking-wider uppercase">
                        {{translate('general.credibility')}}
                    </div>
                    <div class="text-xs leading-4 font-normal">{{$article->getLabel(\App\Models\Question::CREDIBILITY_WEIGHT)->title}}</div>
                </div>
                <x-rating score="{{$article->review?->score_2 ?? 100}}"/>
            </div>
            <div class="flex flex-row justify-between items-center py-3 mt-0 border-b-2 border-solid border-gray-200">
                <div class="flex flex-col">
                    <div class="text-xs leading-4 font-medium tracking-wider uppercase">
                        {{translate('general.professionalism')}}
                    </div>
                    <div class="text-xs leading-4 font-normal">{{$article->getLabel(\App\Models\Question::PROFESSIONALISM_WEIGHT)->title}}</div>
                </div>
                <x-rating score="{{$article->review?->score_1 ?? 100}}"/>
            </div>
        @endif
    </div>
</div>
