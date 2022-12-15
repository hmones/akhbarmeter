{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('topic') }}"><i class="nav-icon la la-graduation-cap"></i> Topics</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('publication') }}"><i class="nav-icon la la-newspaper"></i> Publications</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('video') }}"><i class="nav-icon la la-video"></i> Videos</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('translation') }}"><i class="nav-icon la la-language"></i> Translations</a></li>
