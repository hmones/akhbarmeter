<?php

use Illuminate\Support\Facades\Route;

// --------------------------
// Custom Backpack Routes
// --------------------------
// This route file is loaded automatically by Backpack\Base.
// Routes you generate using Backpack\Generators will be placed here.

Route::group([
    'prefix' => config('backpack.base.route_prefix', 'admin'),
    'middleware' => array_merge(
        (array) config('backpack.base.web_middleware', 'web'),
        (array) config('backpack.base.middleware_key', 'admin')
    ),
    'namespace' => 'App\Http\Controllers\Admin',
], function () { // custom admin routes
    Route::crud('video', 'VideoCrudController');
    Route::crud('topic', 'TopicCrudController');
    Route::crud('publication', 'PublicationCrudController');
    Route::crud('translation', 'TranslationCrudController');
    Route::crud('publisher', 'PublisherCrudController');
    Route::crud('article', 'ArticleCrudController');
    Route::crud('question', 'QuestionCrudController');
    Route::crud('article-topic', 'ArticleTopicCrudController');
    Route::crud('article-type', 'ArticleTypeCrudController');
    Route::crud('question-label', 'QuestionLabelCrudController');
    Route::crud('publisher-score', 'PublisherScoreCrudController');
    Route::crud('fact-checking-article', 'FactCheckingArticleCrudController');
    Route::crud('media', 'MediaCrudController');
    Route::crud('team', 'TeamCrudController');
}); // this should be the absolute last line of this file
