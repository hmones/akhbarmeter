{{-- This file is used to store sidebar items, inside the Backpack admin panel --}}
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('dashboard') }}"><i class="la la-home nav-icon"></i> {{ trans('backpack::base.dashboard') }}</a></li>

<li class="nav-item"><a class="nav-link" href="{{ backpack_url('video') }}"><i class="nav-icon la la-question"></i> Videos</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('topic') }}"><i class="nav-icon la la-question"></i> Topics</a></li>
<li class="nav-item"><a class="nav-link" href="{{ backpack_url('publication') }}"><i class="nav-icon la la-question"></i> Publications</a></li>