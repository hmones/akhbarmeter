@props(['response'])

@php($isMistake = ($response->option->weight === \App\Models\QuestionOption::MISTAKE))

@if(!$response->option->is_not_applicable)
    <div class="flex flex-col {{$isMistake ? 'bg-red-200' : 'bg-green-200'}} mx-8 p-4 rounded-lg space-y-3 my-2">
        <div class="flex flex-row space-x-4 items-center rtl:space-x-reverse">
            <em class="fa fa-{{$isMistake ? 'exclamation' : 'check'}}-circle {{$isMistake ? 'text-red-700' : 'text-green-700'}}"></em>
            <div class="text-lg leading-8 font-semibold">{{$response->option->question->title}}</div>
        </div>
        <div class="text-sm leading-5 font-normal">
            <span class="font-semibold">{{$response->option->title}}</span>
            </br>
            <span>{!! $response->comment !!}</span>
        </div>
    </div>
@endif
