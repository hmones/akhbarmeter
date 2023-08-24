<?php

namespace App\Http\Controllers;

use App\Http\Requests\StatisticsRequest;
use App\Models\Article;
use App\Models\Publisher;
use App\Models\Response;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

class ArticleStatisticsController extends Controller
{
    public function index(StatisticsRequest $request): View
    {
        $from = Carbon::parse($request->get('from', 'first day of last month'));
        $to = Carbon::parse($request->get('to', 'now'));
        $articles = Article::with(['publisher', 'type', 'topic', 'user', 'review'])->whereActive(1)->whereBetween('created_at', [$from, $to])->latest()->get();
        $topics = $articles->countBy('topic.title');
        $types = $articles->countBy('type.title');
        $questions = Response::with(['option.question', 'review.article.publisher'])
            ->whereHas('review.article', function (Builder $query) use ($articles) { $query->whereIn('id', $articles->pluck('id')->toArray()); })
            ->get()
            ->groupBy('option.question.title')
            ->transform(fn($item) => $item->groupBy('option.title')->transform(fn($item) => $item->countBy('review.article.publisher.name')))
            ->toArray();
        $publishers = Publisher::where('active', 1)->get()->pluck('name')->toArray();

        return view('pages.statistics.article', compact('from', 'to', 'topics', 'types', 'questions', 'articles', 'publishers'));
    }

    public function store(StatisticsRequest $request)
    {
//        $filePath = "/";
//
//        if($records != null && sizeof($records) != 0)
//        {
//            ob_clean();
//            ob_start();
//
//            $headrow = array_keys((array)$records[0]);
//
//            header("Content-type:text/csv; charset:utf-8;Content-Disposition:attachment; filename=$filename");
//
//            $filePath = storage_path('temp/public/' . $filename);
//
//            // Use unlink() function to delete a file
//            if(file_exists($filePath)){
//                if (!unlink($filePath)) {
//                    Log::info("$filePath cannot be deleted due to an error");
//                }
//                else {
//                    Log::info("$filePath has been deleted");
//                }
//            }
//
//            $file = fopen($filePath, 'w+');
//
//            fputcsv($file, $headrow);
//
//            foreach($records as $record) {
//                fputcsv($file, (array)$record);
//            }
//
//            fclose($file);
//        }
//
//        return asset('storage/temp/public/' . $filename . '?' . Carbon::now());
    }
}
