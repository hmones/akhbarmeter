<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreTopicRequest;
use App\Models\Topic;

class TopicController extends AdminController
{
    public function __construct()
    {
        $this->modelPlural = 'topics';
        $this->modelClass = Topic::class;
        $this->requestClass = StoreTopicRequest::class;
        $this->displayedFields = ['title', 'type'];
    }
}
