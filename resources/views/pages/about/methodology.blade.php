@extends('layouts.default')
@section('title')
    Methodology (How it works?)
@endsection
@section('content')
    @include('partials.page-header', [
        'headline' => 'How it works?',
        'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit.'
    ])
    <div class="p-4 bg-indigo-50 md:container md:mx-auto md:rounded-xl md:flex items-center">
        <div class="flex flex-col space-y-4 md:space-y-0 md:p-10">
            <div class="flex flex-col">
                <div class="text-xl leading-10 font-extrabold md:text-4xl">
                    How do we evaluate articles
                    and news papers?
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-blue-600 text-xl font-extrabold leading-10 md:text-4xl">
                    Download our news report today.
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-sm leading-5 font-normal text-gray-500 md:text-xl md:leading-7">
                    Below you can download AkhbarMeter's handbook for reviewing news articles. The handbook illustrates
                    the methodology in full details with examples that helps to understand each question and its answers
                </div>
            </div>
        </div>
        <div class="flex flex-col mt-4">
            <a href="#" class="bg-blue-600 shadow-sm py-2 px-4 rounded text-white w-fit mt-2">
                Download
            </a>
        </div>
    </div>

    <div
        class="flex flex-col md:flex-row items-center justify-center text-center px-8 my-6 space-y-6 md:space-y-0 md:container md:mx-auto md:items-start md:mt-20">
        <div class="flex flex-col md:w-1/3 md:text-left md:px-10 md:space-y-4">
            <div class="flex flex-col">
                <div class="font-extrabold text-xl leading-10 md:text-3xl md:leading-9">
                    Frequently asked questions
                </div>
            </div>
            <div class="flex flex-col">
                <div class="text-lg leading-7 font-normal text-gray-500">
                    Can’t find the answer you’re looking for? Reach out to our <a href="#" class="text-blue-600">customer
                        support</a> team.
                </div>
            </div>
        </div>
        <div class="flex flex-col space-y-6 md:w-2/3">
            <div class="flex flex-col text-left space-y-2">
                <div class="flex flex-row text-lg leading-6 font-semibold">
                    How are articles rated on AkhbarMeter
                </div>
                <div class="text-base leading-6 font-normal text-gray-500">
                    The team evaluate news articles by answering a series of questions (19 questions) that are available
                    here. These questions are derived from international and local media code of ethics and professional
                    standards . The questions are categorized into three sections, the first section is concerned with
                    violations of law conduct and human rights. The second section is concerned with manipulation
                    techniques
                    used by media channels, whereas the third section is concerned with professionalism in news
                    reporting
                    and content writing.
                </div>
            </div>
            <div class="flex flex-col text-left space-y-2">
                <div class="flex flex-row text-lg leading-6 font-semibold">
                    What does the rating percentage refer to?
                </div>
                <div class="text-base leading-6 font-normal text-gray-500">
                    All rated articles get a score from 0 to 100%. This score reflects the degree to which the news
                    article
                    aligns with professional standards and code of ethics. The score is calculated automatically after
                    each
                    article is rated by one of our reviewers.
                </div>
            </div>
        </div>
    </div>

    <div class="text-center md:mt-20">
        @include('partials.page-header', [
            'headline' => 'Do all criteria have the same influence on the final rating score?',
            'description' => 'The three different categories of questions (professionalism, violations of law conduct and human rights, and manipulation) do not equally influence the public.'
        ])
    </div>

    <div class="container px-4 flex flex-col space-y-8 md:flex-row md:space-y-0 md:space-x-4">
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path
                        d="M33.2441 24C33.2441 28.9706 29.2147 33 24.2441 33M33.2441 24C33.2441 19.0294 29.2147 15 24.2441 15M33.2441 24H15.2441M24.2441 33C19.2736 33 15.2441 28.9706 15.2441 24M24.2441 33C25.901 33 27.2441 28.9706 27.2441 24C27.2441 19.0294 25.901 15 24.2441 15M24.2441 33C22.5873 33 21.2441 28.9706 21.2441 24C21.2441 19.0294 22.5873 15 24.2441 15M15.2441 24C15.2441 19.0294 19.2736 15 24.2441 15"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                Professionalism
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                The extent to which the question damages public opinion determines its weight in the score.
            </div>
        </div>
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path
                        d="M15.2441 18L18.2441 19M18.2441 19L15.2441 28C17.0167 29.3334 19.4728 29.3334 21.2453 28M18.2441 19L21.2442 28M18.2441 19L24.2441 17M30.2441 19L33.2441 18M30.2441 19L27.2441 28C29.0167 29.3334 31.4728 29.3334 33.2453 28M30.2441 19L33.2442 28M30.2441 19L24.2441 17M24.2441 15V17M24.2441 33V17M24.2441 33H21.2441M24.2441 33H27.2441"
                        stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                Credibility
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                The questions in the category of legal and human rights violations have the highest weight among all the
                questions, and then come the questions related to manipulation and propaganda
            </div>
        </div>
        <div class="flex flex-col space-y-4 md:w-1/3">
            <div class="flex flex-col">
                <svg width="49" height="48" viewBox="0 0 49 48" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect x="0.244141" width="48" height="48" rx="6" fill="#6366F1"/>
                    <path d="M25.2441 22V15L16.2441 26H23.2441L23.2441 33L32.2441 22L25.2441 22Z" stroke="white"
                          stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                </svg>
            </div>
            <div class="flex flex-col text-lg leading-6 font-medium">
                Human Rights Compliance
            </div>
            <div class="flex-flex-col text-base leading-6 font-normal text-gray-500">
                finally the questions of professionalism and code of ethics, which AkhbarMeter team is keen on
                promoting.
            </div>
        </div>
    </div>

    <div class="bg-gray-50 p-4 my-6 space-y-4 md:space-y-8 md:container md:rounded-xl md:mx-auto">
        <div class="text-xl font-extrabold leading-10 mb-8 md:p-8 md:text-3xl md:leading-8 md:tracking-tight">
            What are the questions that we base our rating on?
        </div>
        @include('partials.components.accordion', [
            'headline' => "Did the journalist mix between facts and his/her personal opinion?",
            'description' => 'The content is free of insults, defamation or slandering directed towards an individual
            or group/The journalist highlighted that the source has insulted, defamed or slandered an individual or a
            group in their statements/The journalist insulted, defamed or slandered an individual or a group/The
            journalist did not refer to insults, defaming or slandering of individual or a group in the source
            statements/Not applicable'
        ])
        @include('partials.components.accordion', [
            'headline' => "Did the journalist mix between facts and his/her personal opinion?",
            'description' => 'The content is free of insults, defamation or slandering directed towards an individual
            or group/The journalist highlighted that the source has insulted, defamed or slandered an individual or a
            group in their statements/The journalist insulted, defamed or slandered an individual or a group/The
            journalist did not refer to insults, defaming or slandering of individual or a group in the source
            statements/Not applicable'
        ])
    </div>

    <div class="container flex flex-col space-y-2 my-4 md:space-y-10 md:py-20">
        <div class="flex flex-col text-lg leading-6 font-semibold md:text-3xl md:leading-9 md:font-bold">
            Disclamier
        </div>
        <div
            class="flex flex-col text-sm leading-5 font-normal text-gray-500 md:text-base md:leading-6 md:text-black">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Dui arcu sodales ullamcorper mauris eget eleifend
            proin semper odio. Convallis sit imperdiet egestas at sed duis donec at amet. Orci sed non diam, vel, enim
            convallis magna. Orci mattis orci dictum varius. Semper luctus risus platea feugiat lobortis blandit enim at
            sit. Vitae consectetur pharetra leo, ut sed potenti lectus sagittis, dignissim.
            Vulputate elit massa pellentesque eu id commodo ipsum. Cursus tellus sit suspendisse arcu vel viverra. Dolor
            integer cum dolor pellentesque elementum quisque. Ac ultrices sed velit ac lacus vulputate dictum. Nulla
            felis quam tempor purus id. Mi nam ornare ultricies fermentum tristique mi. Id arcu mauris egestas viverra
            sed. Auctor pretium fermentum nam sed platea.    
        </div>
    </div>
@endsection
