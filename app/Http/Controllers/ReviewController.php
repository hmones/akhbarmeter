<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReviewRequest;
use App\Models\Article;
use App\Models\Question;
use App\Repositories\ReviewRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function __construct(protected ReviewRepository $reviewRepository)
    {
    }

    public function edit(Article $article): View
    {
        $questions = Question::whereActive(1)->orderBy('weight', 'asc')->get()->groupBy('weight');

        return view('pages.review.edit', compact('article', 'questions'));
    }

    public function store(ReviewRequest $request): RedirectResponse
    {
        $data = $request->safe()->toArray();
        $review = data_get($data, 'review', []);
        $responses = data_get($data, 'responses', []);

        $article = Article::findOrFail(data_get($data, 'review.article_id'));
        $article->update($data['article']);

        if ($article->review()->exists()) {
            $this->reviewRepository->updateReviewAndResponses($article->review, $review, $responses);

            return redirect()->route('dashboard')->with('success', 'Article review created successfully');
        }

        $this->reviewRepository->saveReviewAndResponses($review, $responses);

        return redirect()->route('dashboard')->with('success', 'Article review updated successfully');
    }
}
