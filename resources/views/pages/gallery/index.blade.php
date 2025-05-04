@extends('layouts.default')

@section('seo')
    <x-seo :title="translate('pages.gallery.header')" :description="translate('pages.gallery.description')" />
@endsection

@section('content')
    <div class="container mx-auto max-h-full px-2">
        <x-page-header :headline="translate('pages.gallery.header')" :description="translate('pages.gallery.description')"/>
        <style>
            .gallery-swiper {
                display: grid;
                grid-template-columns: repeat(3, 1fr);
                gap: 20px 20px;
                width: 100%;
                max-width: 1200px;
                margin: 0 auto;
            }
        </style>
        <div class="container mb-10 space-y-10">
            <div class="gallery-swiper">
                @foreach($gallery as $record)
                    <x-cards.gallery :record="$record" :index="$loop->index" />
                @endforeach
            </div>
            <div class="container my-20 space-y-10" dir="ltr">
                {{ $gallery->appends(request()->except('page'))->links() }}
            </div>
        </div>
@endsection
