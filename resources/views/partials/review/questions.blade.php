<div class="text-xl text-semibold mb-4">Questions</div>
<div class="flex flex-col space-y-4">
    @foreach($questions as $category => $categoryQuestions)
        <!-- Category Header -->
        <div class="flex flex-row space-x-4 items-center text-gray-500">
            <em class="fa fa-arrow-right text-blue-700"></em>
            <div class="text-xl text-semibold">
                @switch($category)
                    @case(\App\Models\Question::HUMAN_RIGHTS_WEIGHT)
                        Human Rights
                        @break
                    @case(\App\Models\Question::CREDIBILITY_WEIGHT)
                        Credibility
                        @break
                    @default
                        Professionalism
                @endswitch
            </div>
        </div>

        <!-- Questions -->
        @foreach($categoryQuestions as $question)
            @php
                $questionResponse = $article->review?->responses?->whereIn('option_id', $question->options->pluck('id')->toArray())->first();
            @endphp
            <div class="px-4 space-y-4">
                <div class="flex flex-row mb-4 space-x-4">
                    <em class="fa fa-arrow-right text-blue-700"></em>
                    <div class="text-sm">{{$question->title}}</div>
                    @if(!empty($question->description))
                        <i class="circular small question grey icon opt_tooltips"
                           data-content="{{$question->description}}"></i>
                    @endif
                </div>
                <div class="flex flex-row px-8 space-x-4">
                    @foreach($question->options as $option)
                        <input type="radio" id="option_{{$question->id}}_{{$option->id}}"
                               name="responses[{{$question->id}}][option_id]"
                               value="{{$option->id}}"
                               @if($questionResponse?->option_id === $option->id || (!$article->review()->exists() && $option->selected))
                                   checked
                               @endif
                        />
                        <label for="option_{{$question->id}}_{{$option->id}}"
                               class="{{$option->weight ? 'text-green-500' : 'text-red-500'}}">
                            {{$option->title}}
                            @if(!empty($option->description))
                                <i class="circular question grey icon link opt_tooltips"
                                   data-content="{{$option->description}}"></i>
                            @endif
                        </label>
                    @endforeach
                </div>
                <div class="px-8">
                    @include('partials.components.rich-text', [
                            'id' => 'comment_' . $question->id,
                            'label' => 'Comment',
                            'name' => 'responses[' . $question->id . '][comment]',
                            'value' => $questionResponse?->comment])
                </div>
                <div class="px-8">
                    @include('partials.components.rich-text', [
                            'id' => 'annotation_q_' . $question->id,
                            'label' => 'Text containing the mistake',
                            'name' => 'responses[' . $question->id . '][annotation]',
                            'value' => $questionResponse?->annotation])
                </div>
            </div>
        @endforeach
    @endforeach
</div>
<div class="mt-6">
    @include('partials.components.rich-text', [
                'id' => 'reviewComment',
                'label' => 'Reviewer\'s comment',
                'name' => 'review[comment]',
                'value' => $article?->review?->comment,
                'rows' => 10])
</div>

<x-primary-button class="mt-4 w-24 justify-center">Save </x-primary-button>
