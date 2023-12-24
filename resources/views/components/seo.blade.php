@props([
    'title'       => 'Home page',
    'description' => translate("pages.home.top-section.about-akhbarmeter"),
    'image'       => asset('images/profile.jpg'),
    'keywords'    => 'أخبارميتر,اخبار مصر,اخبار مصرية,اخبار الرياضة,اخبار الفن,اخبار الحوادث,اخبار الصحة,مراة ومنوعات,حظك اليوم,اخبار الاقتصاد, التحقق، أخبار كاذبة, fact checking, IFCN, AkhbarMeter, News, Ranking, Media accountability, Egypt'
])

<meta name="keywords" content="{{ $keywords }}">
<meta name="description" content="{{ $description }}">
<meta property="og:title" content="{{ $title }}" />
<meta property="og:image" content="{{ $image }}" />
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:description" content="{{ $description }}">
<meta name="twitter:title" content="{{ $title }}">
<meta name="twitter:image" content="{{ $image }}">
{{ $slot }}

<title>AkhbarMeter | {{ $title }}</title>
