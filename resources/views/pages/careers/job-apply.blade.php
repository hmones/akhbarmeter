@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.careers.header')" :description="translate('pages.careers.description')" />
@endsection

@section('content')
    <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-5xl leading-10 font-extrabold tracking-tight">{{translate('pages.careers.header')}}</h1>
        </div>
        <div class="flex-initial w-1/3 flex-col">
            <p class="text-lg text-center leading-6 font-normal text-gray-500">
                {{translate('pages.careers.description')}}
            </p>
        </div>
    </div>

    <div class="lg:container mx-auto">
        <div class="flex flex-col lg:flex-row justify-center lg:mx-20 space-y4 lg:my-10 lg:shadow-lg">
            <div class="flex-col lg:flex-row lg:w-1/3 text-white bg-gradient-to-r from-blue-700 to-cyan-700 lg:to-blue-700">
                <div class="p-10 h-full">
                    <div class="flex-col space-y-6 lg:mt-4">
                        <p class="font-extrabold">{{translate('pages.contact.information.header')}}</p>
                        <p>
                            {{translate('pages.contact.information.description')}}
                        </p>
                        <div class="flex flex-row space-x-6 rtl:space-x-reverse">
                            <div class="flex-row">
                                <img src="{{asset('images/icons/phone.svg')}}" alt="Phone Contact"/>
                            </div>
                            <div class="flex-row">
                                +4915255782470
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
                            <div class="flex-row">
                                <img src="{{asset('images/icons/mail.svg')}}" alt="Email Contact"/>
                            </div>
                            <div class="flex-row">
                                info[at]akhbarmeter[dot]org
                            </div>
                        </div>
                        <div class="flex flex-row space-x-4 rtl:space-x-reverse">
                            @include('partials.components.social-media-links')
                        </div>
                    </div>
                </div>
            </div>

            <div class="container flex flex-col w-full items-center lg:justify-center mx-auto space-y-4 my-10 lg:hidden">
                <div class="flex flex-col">
                    <h1 class="text-3xl leading-10 font-extrabold tracking-tight">{{translate('pages.career.header')}} Pooooooo</h1>
                </div>
                <div class="flex-initial flex-col">
                    <p class="text-center leading-6 font-normal text-gray-500">
                        {{translate('pages.career.description')}}
                    </p>
                </div>
            </div>

            <div class="flex-row w-full lg:w-2/3">
                <form action="{{route('career.apply.store', data_get($career, 'id'))}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="p-10 lg:mt-10">
                        <h2 class="hidden lg:block text-3xl leading-10 font-extrabold tracking-tight">
                            {{translate('pages.career.form.header')}}
                        </h2>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto lg:mt-5 lg:space-x-8 rtl:space-x-reverse">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="firstName" class="text-sm">{{translate('pages.career.form.firstName')}}</label>
                                @if($errors->first('firstName'))
                                    <small class="text-red-700">{{$errors->first('firstName')}}</small>
                                @endif
                                <input type="text" id="firstName" name="firstName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="secondName" class="text-sm">{{translate('pages.career.form.secondName')}}</label>
                                @if($errors->first('secondName'))
                                    <small class="text-red-700">{{$errors->first('secondName')}}</small>
                                @endif
                                <input type="text" id="secondName" name="secondName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto mt-4 lg:mt-5 lg:space-x-8 rtl:space-x-reverse">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="email" class="text-sm">{{translate('pages.career.form.email')}}</label>
                                @if($errors->first('email'))
                                    <small class="text-red-700">{{$errors->first('email')}}</small>
                                @endif
                                <input type="text" id="email" name="email"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="phone" class="text-sm">{{translate('pages.career.form.phone')}}</label>
                                @if($errors->first('phone'))
                                    <small class="text-red-700">{{$errors->first('phone')}}</small>
                                @endif
                                <input type="text" id="phone" name="phone"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                                <x-honeypot />
                            </div>
                        </div>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto mt-4 lg:mt-5 lg:space-x-8 rtl:space-x-reverse">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="jobTitle" class="text-sm">{{translate('pages.career.form.jobTitle')}}</label>
                                @if($errors->first('email'))
                                    <small class="text-red-700">{{$errors->first('jobTitle')}}</small>
                                @endif
                                <input type="text" id="jobTitle" name="jobTitle"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="phone" class="text-sm">{{translate('pages.career.form.uploadCv')}}</label>
                                @if($errors->first('uploadCv'))
                                    <small class="text-red-700">{{$errors->first('uploadCv')}}</small>
                                @endif
                                <input type="file" id="uploadCv" name="uploadCv"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1" accept=".pdf,.doc,.docx"/>
                                <x-honeypot />
                            </div>
                        </div>
                        <div class="flex flex-row w-auto mt-4 space-x-8">
                            <div class="flex flex-col w-full">
                                <div class="flex flex-row justify-content-between">
                                    <label for="message" class="text-sm">{{translate('pages.career.form.message')}}</label>
                                    <small class="text-gray-500">{{translate('pages.career.form.limit')}}</small>
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
                                {{translate('pages.career.form.button')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @include('partials.support')
@endsection
