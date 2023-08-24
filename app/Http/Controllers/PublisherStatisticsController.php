<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticsRequest;
use App\Models\Publisher;
use App\Models\PublisherScore;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Carbon;

class PublisherStatisticsController extends Controller
{
    public function index(StatisticsRequest $request): View
    {
        $from = $request->get('from', Carbon::parse('first day of last month'));
        $to = $request->get('to', now());

        $publishers = Publisher::with(['scores' => function ($query) use ($from, $to) {
            $query->whereBetween('to', [$from, $to])->where('period', PublisherScore::PERIOD_WEEK);
        }])->get() ?? [];

        return view('pages.statistics.publisher', compact('publishers', 'from', 'to'));
    }
}
