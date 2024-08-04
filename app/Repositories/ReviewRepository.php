<?php

namespace App\Repositories;

use App\Models\Question;
use App\Models\QuestionOption;
use App\Models\Review;
use Illuminate\Support\Arr;

class ReviewRepository
{
    public function updateReviewAndResponses(Review $oldReview, array $review, array $responses): void
    {
        $oldReview->responses()->delete();
        $oldReview->delete();
        $this->saveReviewAndResponses($review, $responses);
    }

    public function saveReviewAndResponses(array $review, array $responses): void
    {
        $review = array_merge($review, $this->getScoreFromResponses($responses));
        $reviewModel = Review::create($review);
        $reviewModel->responses()->createMany($responses);
        $reviewModel->article()->update(['active' => 1, 'score_at' => now()]);
    }

    public function getScoreFromResponses(array $responses): array
    {
        $selectedOptions = Arr::pluck($responses, 'option_id');
        $scores = QuestionOption::whereIn('id', $selectedOptions)->with('question')->get()->groupBy('question.weight');

        //Calculate Human Rights Score
        $scoreHumanRights = $scores->get(Question::HUMAN_RIGHTS_WEIGHT)?->average('weight') ?? 1;

        //Calculate Credibility Score
        $scoreCredibility = $scores->get(Question::CREDIBILITY_WEIGHT)?->average('weight') ?? 1;

        //Calculate Professionalism Score
        $scoreProfessionalism = $scores->get(Question::PROFESSIONALISM_WEIGHT)?->average('weight') ?? 1;

        $score = (
            ($scoreHumanRights * Question::HUMAN_RIGHTS_WEIGHT)
            + ($scoreCredibility * Question::CREDIBILITY_WEIGHT)
            + ($scoreProfessionalism * Question::PROFESSIONALISM_WEIGHT)
        ) / (Question::PROFESSIONALISM_WEIGHT + Question::CREDIBILITY_WEIGHT + Question::HUMAN_RIGHTS_WEIGHT);

        return [
            'score_1' => (int) ($scoreProfessionalism * 100),
            'score_2' => (int) ($scoreCredibility * 100),
            'score_3' => (int) ($scoreHumanRights * 100),
            'score' => (int) ($score * 100),
        ];
    }
}
