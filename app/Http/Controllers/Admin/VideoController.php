<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreVideoRequest;
use App\Models\Video;

class VideoController extends AdminController
{
    public function __construct()
    {
        $this->modelPlural = 'videos';
        $this->modelClass = Video::class;
        $this->requestClass = StoreVideoRequest::class;
    }
}
