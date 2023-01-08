@props(['response'])

<div class="flex flex-col bg-{{$response->option->weight ? 'red' : 'green'}}-200 mx-8 p-4 rounded-lg space-y-3 my-2">
    <div class="flex flex-row space-x-4 items-center rtl:space-x-reverse">
        <em class="fa fa-{{$response->option->weight ? 'exclamation' : 'check'}}-circle text-{{$response->option->weight ? 'red' : 'green'}}-700"></em>
        <div class="text-lg leading-8 font-semibold">{{$response->option->question->title}}</div>
    </div>
    <div class="text-sm leading-5 font-normal">
        <span class="font-semibold">{{$response->option->title}}</span>, {{$response->comment}}
    </div>
</div>
