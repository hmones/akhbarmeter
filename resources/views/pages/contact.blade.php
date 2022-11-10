@extends('layouts.default')
@section('content')
    <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-5xl leading-10 font-extrabold tracking-tight">Contact Us</h1>
        </div>
        <div class="flex-initial w-1/3 flex-col">
            <p class="text-lg text-center leading-6 font-normal text-gray-500">
                Simple text saying what the user should excpect by clicking on any of the news outlets.
            </p>
        </div>
    </div>

    <div class="lg:container mx-auto">
        <div class="flex flex-col lg:flex-row justify-center lg:mx-20 space-y4 lg:my-10 lg:shadow-lg">
            <div class="flex-col lg:flex-row lg:w-1/3 text-white bg-gradient-to-r from-blue-700 to-cyan-700 lg:to-blue-700">
                <div class="p-10 h-full">
                    <div class="flex-col space-y-6 lg:mt-4">
                        <p class="font-extrabold">Contact information</p>
                        <p>Nullam risus blandit ac aliquam justo ipsum. Quam mauris volutpat massa dictumst amet. Sapien
                            tortor lacus arcu.</p>
                        <div class="flex flex-row space-x-6">
                            <div class="flex-row">
                                <img src="{{asset('images/icons/phone.svg')}}" alt="Phone Contact"/>
                            </div>
                            <div class="flex-row">
                                +4915255782470
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            <div class="flex-row">
                                <img src="{{asset('images/icons/mail.svg')}}" alt="Email Contact"/>
                            </div>
                            <div class="flex-row">
                                info@akhbarmeter.org
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4">
                            @include('partials.components.social-media-links')
                        </div>
                    </div>
                </div>
            </div>

            <div class="container flex flex-col w-full items-center lg:justify-center mx-auto space-y-4 my-10 lg:hidden">
                <div class="flex flex-col">
                    <h1 class="text-3xl leading-10 font-extrabold tracking-tight">Contact Us</h1>
                </div>
                <div class="flex-initial flex-col">
                    <p class="text-center leading-6 font-normal text-gray-500">
                        Simple text saying what the user should excpect by clicking on any of the news outlets.
                    </p>
                </div>
            </div>

            <div class="flex-row w-full lg:w-2/3">
                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="p-10 lg:mt-10">
                        <h2 class="hidden lg:block text-3xl leading-10 font-extrabold tracking-tight">Send us a message</h2>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto lg:mt-5 lg:space-x-8">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="firstName" class="text-sm">First name</label>
                                @if($errors->first('firstName'))
                                    <small class="text-red-700">{{$errors->first('firstName')}}</small>
                                @endif
                                <input type="text" id="firstName" name="firstName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="secondName" class="text-sm">Second name</label>
                                @if($errors->first('secondName'))
                                    <small class="text-red-700">{{$errors->first('secondName')}}</small>
                                @endif
                                <input type="text" id="secondName" name="secondName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto mt-4 lg:mt-5 lg:space-x-8">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="email" class="text-sm">Email</label>
                                @if($errors->first('email'))
                                    <small class="text-red-700">{{$errors->first('email')}}</small>
                                @endif
                                <input type="text" id="email" name="email"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="phone" class="text-sm">Phone number</label>
                                @if($errors->first('phone'))
                                    <small class="text-red-700">{{$errors->first('phone')}}</small>
                                @endif
                                <input type="text" id="phone" name="phone"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-row w-auto mt-4 space-x-8">
                            <div class="flex flex-col w-full">
                                <label for="subject" class="text-sm">Subject</label>
                                @if($errors->first('subject'))
                                    <small class="text-red-700">{{$errors->first('subject')}}</small>
                                @endif
                                <input type="text" id="subject" name="subject"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-row w-auto mt-4 space-x-8">
                            <div class="flex flex-col w-full">
                                <div class="flex flex-row justify-content-between">
                                    <label for="message" class="text-sm">Message</label>
                                    <small class="text-gray-500">Max. 500 charachters</small>
                                </div>
                                @if($errors->first('message'))
                                    <small class="text-red-700">{{$errors->first('message')}}</small>
                                @endif
                                <textarea rows="5" id="message" name="message"
                                          class="p-3 border border-gray-300 rounded mt-1"> </textarea>
                            </div>
                        </div>
                        <div class="flex flex-row justify-content-end mt-4">
                            <button type="submit" class="py-2 px-3 rounded bg-blue-600 hover:bg-blue-800 text-white">
                                Send
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="bg-blue-700 text-white mt-4 py-20 mt-5">
        <div class="container flex flex-col w-full items-center justify-center mx-auto space-y-4">
            <div class="flex flex-col justify-content-center text-center">
                <div class="text-4xl leading-10 font-extrabold tracking-tight">Support the project</div>
                <div class="text-4xl leading-10 font-extrabold tracking-tight">Support us now!</div>
            </div>
            <div class="flex-initial w-2/5 flex-col">
                <p class="text-center leading-6 font-normal">
                    We need your help to stay independent and to produce more videos and learning materials that would
                    benefit journalists and media consumers. Our project cannot continue without your support. We would
                    appreciate every cent you pay because this could help us become sustainable.
                </p>
            </div>
            <div class="flex-col">
                <button type="submit" class="mt-2 py-2.5 px-3 rounded bg-white hover:bg-gray-200 text-blue-600">Become
                    partner
                </button>
            </div>
        </div>
    </div>
@endsection
