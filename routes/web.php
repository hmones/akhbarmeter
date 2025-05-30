<?php

use App\Http\Controllers\AboutUsController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ArticleStatisticsController;
use App\Http\Controllers\CareerController;
use App\Http\Controllers\CheckNewsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FactCheckingMethodologyController;
use App\Http\Controllers\FakeNewsController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JobApplyController;
use App\Http\Controllers\PolicyController;
use App\Http\Controllers\PrivacyPolicyController;
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

Route::get('apply-now/careers/{career?}', [JobApplyController::class, 'index'])->name('career.apply.index');
Route::get('policies', [PolicyController::class, 'index'])->name('policy.index');
Route::get('gallery-images/{topicId}', [GalleryController::class, 'show'])->name('gallery.show');
Route::get('gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::post('apply-now/careers/{career?}', [JobApplyController::class, 'store'])->name('career.apply.store');
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
Route::get('privacy', [PrivacyPolicyController::class, 'index'])->name('privacy');
Route::get('cookies', [PrivacyPolicyController::class, 'show'])->name('cookies');
Route::resource('articles', ArticleController::class)->only('index', 'show');
Route::resource('article', ArticleController::class)->only('index', 'show');
Route::resource('publishers', PublisherController::class)->only('index', 'show');
Route::post('check-news-article', [CheckNewsController::class, 'store'])->name('check.news.store');

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('about', [AboutUsController::class, 'index'])->name('about');
Route::redirect('about-us', 'about');
Route::get('akhbarmeter', fn () => view('pages.about.akhbarmeter'))->name('akhbarmeter');
Route::get('methodology', fn () => view('pages.about.methodology'))->name('methodology');
Route::get('media-monitoring-methodology', fn () => view('pages.about.methodology'))->name('media-monitoring-methodology');
Route::get('fact-checking-methodology', [FactCheckingMethodologyController::class, 'index'])->name('fact-checking-methodology.index');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('statistics/articles', [ArticleStatisticsController::class, 'index'])->name('statistics.article');
    Route::post('statistics/articles/download', [ArticleStatisticsController::class, 'store'])->name('statistics.article.download');
    Route::get('statistics/publishers', [PublisherStatisticsController::class, 'index'])->name('statistics.publisher');
    Route::get('reviews/{article}/edit', [ReviewController::class, 'edit'])->name('reviews.edit');
    Route::post('reviews', [ReviewController::class, 'store'])->name('reviews.store');
});
