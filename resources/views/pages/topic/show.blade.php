@extends('layouts.default')
@section('content')
    <div style="background: linear-gradient(rgba(0,0,0,0.5), rgba(0,0,0,0.5)), url('{{Storage::url($topic->image)}}'); background-position: center; background-size: cover;">
        <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16 text-white">
            <div class="flex flex-col">
                <h1 class="text-5xl leading-10 font-extrabold tracking-tight">{{$topic->title}}</h1>
            </div>
            <div class="flex flex-row w-4/5 text-lg text-center leading-6 font-normal mx-auto justify-center space-x-1.5 rtl:space-x-reverse">
                <span>{{$topic->created_at->format('F d, Y')}} |</span>
                <span class="flex flex-row rtl:flex-row-reverse items-center space-x-1.5 rtl:space-x-reverse">
                    <em class="fa fa-clock-o"></em>
                    <span> 5 min read |</span>
                </span>
                <span> Article Author: {{$topic->author_name}} |</span>
                <span> Category: {{\App\Models\Topic::TYPES[$topic->type]}} </span>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="flex flex-row items-center justify-center mx-auto space-y-10 my-16">
            {!! $topic->description !!}
        </div>
    </div>

    <div class="container">
        <div class="flex flex-row items-center justify-center mx-auto space-y-4">
            <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4 py-16">
                <div class="flex flex-col">
                    <div class="text-4xl leading-10 font-extrabold tracking-tight">Related topics</div>
                </div>
                <div class="flex-initial w-4/5 flex-col">
                    <p class="text-lg text-center leading-6 font-normal text-gray-500">
                        Topics that are related to this one
                    </p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-10 space-y-10">
        @foreach($related->chunk(3) as $rowTopics)
            <div
                class="flex flex-col xl:flex-row w-full items-start items-stretch justify-left mx-auto space-y-10 xl:space-y-0">
                @foreach($rowTopics as $record)
                    <div class="flex flex-col xl:flex-row w-full xl:w-1/3 mx-2">
                        <x-cards.topic :topic="$record" />
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>

    <div class="lg:container flex flex-col w-full items-center justify-center mx-auto pt-16 lg:py-16 text-white">
        <div class="flex flex-col lg:flex-row lg:w-3/5 bg-blue-700 lg:rounded justify-center p-5">
            <div class="flex flex-col lg:w-1/2 space-y-2">
                <div class="flex flex-row text-3xl leading-9 font-extrabold">
                    Want accurate news and updates?
                </div>
                <div class="flex flex-row">
                    Sign up for our newsletter to stay up on top of everyday news.
                </div>
            </div>
            <div class="flex flex-col lg:w-1/2">
                <form class="flex flex-row space-y-4 py-6 space-x-2"
                      action="https://akhbarmeter.us11.list-manage.com/subscribe/post?u=2911001665bae66f0f76c3b60&amp;id=04234119df"
                      id="mc-embedded-subscribe-form"
                      method="post"
                      name="mc-embedded-subscribe-form" novalidate="" target="_blank">
                    <label for="mce-EMAIL" class="hidden"></label>
                    <input class="flex flex-row p-3 h-12 border border-gray-300 rounded mt-1 w-full text-black"
                                                          id="mce-EMAIL" name="EMAIL" placeholder="e.g. first.lastname@domain.com" spellcheck="false"
                                                          type="email" value=""/>
                    <input class="flex flex-row px-3 py-2 h-12 shadow-sm rounded mt-1 bg-blue-500"
                           id="mc-embedded-subscribe" name="subscribe" type="submit" value="Notify me">
                </form>
                <div class="flex flex-col text-xs leading-5 font-normal">
                    <span>We care about the protection of your data. Read our <a href="#">Privacy Policy</a></span>
                    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
                    <div aria-hidden="true" style="position: relative; left: -5000px;z-index:-1;">
                        <label class="hidden">
                            <input name="b_2911001665bae66f0f76c3b60_04234119df" tabindex="-1" type="text" value=""/>
                        </label>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
