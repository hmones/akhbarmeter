<?php

namespace App\Jobs;

use App\Http\Services\Scrapper;
use App\Models\Article;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\UploadedFile;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FetchArticle implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    public function handle(): void
    {
        $publisher = $this->article->updatePublisher();

        if (empty($publisher)) {
            return;
        }

        Log::debug('Starting fetch for ' . $this->article->url);
        $scrapper = new Scrapper($this->article->url);

        $data = $scrapper->getContentByXpath(
            $this->article->publisher->title_xpath,
            $this->article->publisher->content_xpath,
            $this->article->publisher->image_xpath,
            $this->article->publisher->author_xpath
        );


        $imagePath = data_get($data, 'image') instanceof UploadedFile
            ? Storage::putFile('article/image', $data['image'])
            : null;


        $this->article->setRawAttributes([
            'image'      => $imagePath,
            'title'      => data_get($data, 'title'),
            'author'     => data_get($data, 'author'),
            'content'    => data_get($data, 'content'),
            'fetched_at' => now()
        ])->save();

        Log::info('Ended fetching for ' . $this->article->url);
    }
}
