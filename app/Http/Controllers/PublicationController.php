<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationSearchRequest;
use App\Models\Publication;

class PublicationController extends Controller
{
    public function index(PublicationSearchRequest $request)
    {
        return view('pages.publication.index', [
            'publications' => Publication::filter($request->safe()->toArray())->orderBy('created_at', 'desc')->paginate(9)
        ]);
    }
}
