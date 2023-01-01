<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use App\Repositories\StatisticsRepository;
use Illuminate\View\View;

class PublisherController extends Controller
{
    public function index(): View
    {
        return view('pages.publisher.index', ['publishers' => Publisher::whereActive(1)->with('scores')->get()->sortBy('name')]);
    }


    public function show(Publisher $publisher): View
    {
        $data = app(StatisticsRepository::class)->getPublisherYearScoreByMonth($publisher);

        return view('pages.publisher.show', compact('publisher', 'data'));
    }
}
