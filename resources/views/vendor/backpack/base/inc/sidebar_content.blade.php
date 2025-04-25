{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('topic') }}"><i class="nav-icon la la-graduation-cap"></i> Topics</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('publication') }}"><i class="nav-icon la la-download"></i> Publications</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('video') }}"><i class="nav-icon la la-video"></i> Videos</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('translation') }}"><i class="nav-icon la la-language"></i> Translations</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fact-checking-article') }}"><i class="nav-icon la la-search"></i> FactChecking Article</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('publisher') }}"><i class="nav-icon la la-book"></i> Publishers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('article-topic') }}"><i class="nav-icon la la-graduation-cap"></i> Article topics</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('article-type') }}"><i class="nav-icon la la-file-archive"></i> Article types</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('article') }}"><i class="nav-icon la la-newspaper"></i> Articles</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('question') }}"><i class="nav-icon la la-question"></i> Questions</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('question-label') }}"><i class="nav-icon la la-sign"></i> Question labels</a></li>


<li class="nav-item"><a class="nav-link" href="{{ backpack_url('publisher-score') }}"><i class="nav-icon la la-sort-numeric-asc"></i> Publisher scores</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('media') }}"><i class="nav-icon la la-th-list"></i> Media</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('team-member') }}"><i class="nav-icon la la-th-list"></i> Team Members</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('career') }}"><i class="nav-icon la la-th-list"></i> Careers</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('tag') }}"><i class="nav-icon la la-th-list"></i> Tags</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('about-us') }}"><i class="nav-icon la la-th-list"></i> About us</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('policy') }}"><i class="nav-icon la la-th-list"></i> Policies</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('privacy-policy') }}"><i class="nav-icon la la-th-list"></i> Privacy policies</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('fact-checking-methodology') }}"><i class="nav-icon la la-th-list"></i> Fact Check Methodology</a></li>
<li class="nav-item nav-link">@include('partials.components.language-switcher')</li>
