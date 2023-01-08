@props(['headline' => '', 'description' => '', 'hideOnMobile' => false])

<div class="container {{$hideOnMobile ? 'hidden md:flex' : 'flex'}} flex-col w-full items-center justify-center mx-auto space-y-4 my-8 md:my-16">
    <div class="flex flex-col">
        <h1 class="text-xl font-extrabold leading-10 md:text-5xl md:tracking-tight">{{$headline}}</h1>
    </div>
    <div class="flex-initial w-4/5 md:w-1/3 flex-col">
        <p class="text-sm leading-7 font-normal md:text-xl text-gray-500 text-center">
            {{$description}}
        </p>
    </div>
</div>
