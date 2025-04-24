@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.team-members.header')" :description="translate('pages.team-members.description')" />
@endsection

@section('content')
    <div class="container hidden lg:flex flex-col w-full items-center justify-center mx-auto space-y-4 my-16">
        <div class="flex flex-col">
            <h1 class="text-5xl leading-10 font-extrabold tracking-tight">{{translate('pages.team-members.header')}}</h1>
        </div>
        <div class="flex-initial w-1/2 flex-col">
            <p class="text-lg text-center leading-6 font-normal text-gray-500">
                {{translate('pages.team-members.description')}}
            </p>
        </div>
    </div>

    <div class="lg:container mx-auto">
        @foreach($teamMembers as $teamMember)
            <div class="flex flex-col lg:flex-row items-center bg-white shadow-md rounded-lg p-6 w-full mb-5">
                <div class="flex-shrink-0 mb-4 lg:mb-0 lg:mr-6">
                    <img class="h-72 w-72 rounded-full object-cover"
                         src="{{ Storage::url(data_get($teamMember, 'image')) }}"
                         alt="{{ data_get($teamMember, 'fullName') }}">
                </div>
                <div class="p-6 lg:pl-0">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-800">{{ data_get($teamMember, 'fullName') }}</h2>
                        <p class="text-gray-600">{{ data_get($teamMember, 'jobTitle') }}</p>
                    </div>
                    <p class="text-gray-700 mt-4">
                        {!! data_get($teamMember, 'bio') !!}
                    </p>
                    <div class="mt-4 flex space-x-4">
                        @if(data_get($teamMember, 'linkedIn'))
                            <a href="{{ data_get($teamMember, 'linkedIn') }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M19 0h-14c-2.761 0-5 2.239-5 5v14c0 2.761 2.239 5 5 5h14c2.761 0 5-2.239 5-5v-14c0-2.761-2.239-5-5-5zm-11.798 19h-2.818v-9h2.818v9zm-1.409-10.326c-.906 0-1.641-.735-1.641-1.641s.735-1.641 1.641-1.641 1.641.735 1.641 1.641-.735 1.641-1.641 1.641zm13.207 10.326h-2.819v-4.799c0-1.145-.023-2.619-1.597-2.619-1.597 0-1.841 1.248-1.841 2.537v4.881h-2.818v-9h2.706v1.229h.039c.376-.713 1.294-1.462 2.662-1.462 2.847 0 3.372 1.873 3.372 4.307v4.926z"/>
                                </svg>
                            </a>
                        @endif
                        &nbsp;
                        @if(data_get($teamMember, 'email'))
                            <a href="mailto:{{ data_get($teamMember, 'email') }}" class="text-blue-600 hover:text-blue-800">
                                <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20 4H4C2.895 4 2 4.895 2 6v12c0 1.105.895 2 2 2h16c1.105 0 2-.895 2-2V6c0-1.105-.895-2-2-2zm-1.4 2L12 10.991 5.4 6h13.2zM4 18V8l7.6 5.409c.26.185.59.185.85 0L20 8v10H4z"/>
                                </svg>
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <div class="bg-gray-100 py-16 flex justify-center">
        <div class="text-center max-w-2xl">
            <h2 class="text-2xl font-bold">{{ translate('pages.ourTeam.wantToBePartOfTeam.header') }}</h2>
            <p class="text-gray-600 mt-4">
                {{ translate('pages.ourTeam.wantToBePartOfTeam.description') }}
            </p>
            <a href="{{ route('careers.index', ) }}" class="mt-6 inline-block bg-[#4F46E5] text-white font-semibold py-3 px-6 rounded-lg">
                {{ translate('pages.careers.apply') }}
            </a>
        </div>
    </div>
@endsection
