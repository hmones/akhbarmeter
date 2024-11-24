<?php

namespace App\Http\Controllers;

use App\Exports\ArticlesExport;
use App\Http\Requests\StatisticsRequest;
use App\Models\Article;
use App\Models\Publisher;
use App\Models\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class ArticleStatisticsController extends Controller
{
    public function index(StatisticsRequest $request): View
    {
        $articles = $this->getArticles($request);
        $topics = $articles->countBy('topic.title');
        $types = $articles->countBy('type.title');
        $questions = $this->getQuestionsForArticles($articles);
        $publishers = Publisher::where('active', 1)->pluck('name')->toArray();

        return view('pages.statistics.article', compact('topics', 'types', 'questions', 'articles', 'publishers'));
    }

    public function store(StatisticsRequest $request): BinaryFileResponse
    {
        $articles = $this->getArticles($request);
        $summary = $this->getQuestionsForArticles($articles);

        return Excel::download(new ArticlesExport($articles, $summary), 'reviews.xlsx');
    }

    protected function getArticles(StatisticsRequest $request): Collection
    {
        $from = Carbon::parse($request->get('from', 'first day of last month'));
        $to = Carbon::parse($request->get('to', 'now'));

        return Article::with(['publisher', 'type', 'topic', 'user', 'review'])->whereActive(1)->whereBetween('created_at', [$from, $to])->latest()->get();
    }

    protected function getQuestionsForArticles(Collection $articles): array
    {
        return Response::with(['option.question', 'review.article.publisher'])
            ->whereHas('review.article', function (Builder $query) use ($articles) {
                $query->whereIn('id', $articles->pluck('id')->toArray());
            })
            ->get()
            ->groupBy('option.question.title')
            ->transform(fn ($item) => $item->groupBy('option.title')->transform(fn ($item) => $item->countBy('review.article.publisher.name')))
            ->toArray();
    }
}
