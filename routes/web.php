<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleStatisticsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CheckNewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FakeNewsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\PrivacyController;
use App\Http\Controllers\PublicationController;
use App\Http\Controllers\PublisherController;
use App\Http\Controllers\PublisherStatisticsController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\TeamMemberController;
use App\Http\Controllers\TopicController;
use App\Http\Controllers\VideoController;
use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::resource('careers/{career}/apply-now', JobApplyController::class)
    ->names([
        'index' => 'career.apply.index',
        'store' => 'career.apply.store'
    ]);
Route::resource('careers', CareerController::class)->only('index', 'show')
->names([
    'index' => 'careers.index',
    'show'  => 'careers.show'
]);
Route::get('tags/search', [TagController::class, 'index'])->name('tags.index');
Route::get('our-team', [TeamMemberController::class, 'index'])->name('team-member.index');
Route::get('contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('contact', [ContactController::class, 'store'])->name('contact.store')->middleware(ProtectAgainstSpam::class);
Route::resource('videos', VideoController::class)->only(['index', 'show']);
Route::resource('publications', PublicationController::class)->only(['index']);
Route::redirect('topics/akhbar-kathb', '/topics');
Route::get('/post/{topic}', [TopicController::class, 'show']);
Route::resource('topics', TopicController::class)->only(['index', 'show']);
Route::get('fake-news', [FakeNewsController::class, 'index'])->name('fake.news');
Route::get('privacy', [PrivacyController::class, 'index'])->name('privacy');
Route::get('cookies', [PrivacyController::class, 'show'])->name('cookies');
Route::resource('articles', ArticleController::class)->only('index', 'show');
Route::resource('article', ArticleController::class)->only('index', 'show');
Route::resource('publishers', PublisherController::class)->only('index', 'show');
Route::post('check-news-article', [CheckNewsController::class, 'store'])->name('check.news.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', fn () => view('pages.about.main'))->name('about');
Route::redirect('about-us', 'about');
Route::get('akhbarmeter', fn () => view('pages.about.akhbarmeter'))->name('akhbarmeter');
Route::get('methodology', fn () => view('pages.about.methodology'))->name('methodology');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('statistics/articles', [ArticleStatisticsController::class, 'index'])->name('statistics.article');
    Route::post('statistics/articles/download', [ArticleStatisticsController::class, 'store'])->name('statistics.article.download');
    Route::get('statistics/publishers', [PublisherStatisticsController::class, 'index'])->name('statistics.publisher');
    Route::get('reviews/{article}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});
