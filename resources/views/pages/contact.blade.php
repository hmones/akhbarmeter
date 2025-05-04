@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.contact.header')" :description="translate('pages.contact.description')" />
@endsection

@section('content')
    <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-5xl leading-10 font-extrabold tracking-tight">{{translate('pages.contact.header')}}</h1>
        </div>
        <div class="flex-initial w-1/3 flex-col">
            <p class="text-lg text-center leading-6 font-normal text-gray-500">
                {{translate('pages.contact.description')}}
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
                    <h1 class="text-3xl leading-10 font-extrabold tracking-tight">{{translate('pages.contact.header')}}</h1>
                </div>
                <div class="flex-initial flex-col">
                    <p class="text-center leading-6 font-normal text-gray-500">
                        {{translate('pages.contact.description')}}
                    </p>
                </div>
            </div>

            <div class="flex-row w-full lg:w-2/3">
                <form action="{{route('contact.store')}}" method="post">
                    @csrf
                    <div class="p-10 lg:mt-10">
                        <h2 class="hidden lg:block text-3xl leading-10 font-extrabold tracking-tight">
                            {{translate('pages.contact.form.header')}}
                        </h2>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto lg:mt-5 lg:space-x-8 rtl:space-x-reverse">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="firstName" class="text-sm">{{translate('pages.contact.form.firstName')}}</label>
                                @if($errors->first('firstName'))
                                    <small class="text-red-700">{{$errors->first('firstName')}}</small>
                                @endif
                                <input type="text" id="firstName" name="firstName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="secondName" class="text-sm">{{translate('pages.contact.form.secondName')}}</label>
                                @if($errors->first('secondName'))
                                    <small class="text-red-700">{{$errors->first('secondName')}}</small>
                                @endif
                                <input type="text" id="secondName" name="secondName"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-col space-y-6 lg:space-y-0 lg:flex-row w-auto mt-4 lg:mt-5 lg:space-x-8 rtl:space-x-reverse">
                            <div class="flex flex-col lg:w-1/2">
                                <label for="email" class="text-sm">{{translate('pages.contact.form.email')}}</label>
                                @if($errors->first('email'))
                                    <small class="text-red-700">{{$errors->first('email')}}</small>
                                @endif
                                <input type="text" id="email" name="email"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                            <div class="flex flex-col lg:w-1/2">
                                <label for="phone" class="text-sm">{{translate('pages.contact.form.phone')}}</label>
                                @if($errors->first('phone'))
                                    <small class="text-red-700">{{$errors->first('phone')}}</small>
                                @endif
                                <input type="text" id="phone" name="phone"
                                       class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                                <x-honeypot />
                            </div>
                        </div>
                        <div class="flex flex-row w-auto mt-4 space-x-8">
                            <div class="flex flex-col w-full">
                                <label for="subject" class="text-sm">{{translate('pages.contact.form.subject')}}</label>
                                @if($errors->first('subject'))
                                    <small class="text-red-700">{{$errors->first('subject')}}</small>
                                @endif
                                <select id="subject" name="subject" class="p-3 h-12 border border-gray-300 rounded mt-1 appearance-none bg-no-repeat bg-[length:1rem] ltr:bg-[center_right_0.5rem] rtl:bg-[center_left_0.5rem] bg-[url('data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxNiIgaGVpZ2h0PSIxNiIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9ImN1cnJlbnRDb2xvciIgc3Ryb2tlLXdpZHRoPSIyIiBzdHJva2UtbGluZWNhcD0icm91bmQiIHN0cm9rZS1saW5lam9pbj0icm91bmQiPjxwb2x5bGluZSBwb2ludHM9IjYgOSAxMiAxNSAxOCA5Ij48L3BvbHlsaW5lPjwvc3ZnPgo=')]">
                                    <option value="{{ translate('pages.contact.form.generalInquiry') }}" {{ old('subject') == translate('pages.contact.form.generalInquiry') ? 'selected' : '' }}>{{ translate('pages.contact.form.selectSubject.generalInquiry') }}</option>
                                    <option value="{{ translate('pages.contact.form.suggestion') }}" {{ old('subject') == translate('pages.contact.form.suggestion') ? 'selected' : '' }}>{{ translate('pages.contact.form.suggestion') }}</option>
                                    <option value="{{ translate('pages.contact.form.correction') }}" {{ old('subject') == translate('pages.contact.form.correction') ? 'selected' : '' }}>{{ translate('pages.contact.form.correction') }}</option>
                                    <option value="{{ translate('pages.contact.form.complaint') }}" {{ old('subject') == translate('pages.contact.form.complaint') ? 'selected' : '' }}>{{ translate('pages.contact.form.complaint') }}</option>
                                </select>
                            </div>
                        </div>
                        <div id="urlField" class="flex flex-row w-auto mt-4 space-x-8 hidden">
                            <div class="flex flex-col w-full">
                                <label for="pageUrl" class="text-sm">{{translate('pages.contact.form.url') ?? 'URL'}}</label>
                                @if($errors->first('pageUrl'))
                                    <small class="text-red-700">{{$errors->first('pageUrl')}}</small>
                                @endif
                                <input type="url" id="pageUrl" name="pageUrl" value="{{ old('pageUrl') }}" class="p-3 h-12 border border-gray-300 rounded mt-1"/>
                            </div>
                        </div>
                        <div class="flex flex-row w-auto mt-4 space-x-8">
                            <div class="flex flex-col w-full">
                                <div class="flex flex-row justify-content-between">
                                    <label for="message" class="text-sm">{{translate('pages.contact.form.message')}}</label>
                                    <small class="text-gray-500">{{translate('pages.contact.form.limit')}}</small>
                                </div>
                                @if($errors->first('message'))
                                    <small class="text-red-700">{{$errors->first('message')}}</small>
                                @endif
                                <textarea rows="5" id="message" name="message"
                                          class="p-3 border border-gray-300 rounded mt-1">{{ old('message') }}</textarea>
                            </div>
                        </div>
                        <div class="flex flex-row justify-content-end mt-4">
                            <button type="submit" class="py-2 px-3 rounded bg-blue-600 hover:bg-blue-800 text-white">
                                {{translate('pages.contact.form.button')}}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleUrlField() {
            const urlField = document.getElementById('urlField');
            const urlInput = document.getElementById('pageUrl');
            const subjectSelect = document.getElementById('subject');
            const selectedOption = subjectSelect.options[subjectSelect.selectedIndex].index;
            const hasValidationError = @json($errors->has('pageUrl'));

            if (hasValidationError || selectedOption === 1 || selectedOption === 2) {
                urlField.classList.remove('hidden');
                urlInput.setAttribute('required', 'required');
            } else {
                urlField.classList.add('hidden');
                urlInput.removeAttribute('required');
            }
        }

        document.addEventListener('DOMContentLoaded', toggleUrlField);
        document.getElementById('subject').addEventListener('change', toggleUrlField);
    </script>
@endsection
