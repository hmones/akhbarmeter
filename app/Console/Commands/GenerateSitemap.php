<?php

namespace App\Console\Commands;

use App\Models\Article;
use App\Models\Publisher;
use App\Models\Topic;
use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use Symfony\Component\Console\Command\Command as CommandAlias;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';

    protected $description = 'Automatically generates an xml sitemap';

    public function handle(): int
    {
        $sitemap = Sitemap::create()
            ->add(Url::create('/'))
            ->add(Url::create('/about')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/about-us')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/akhbarmeter')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/methodology')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/contact')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY))
            ->add(Url::create('/videos')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/publications')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/topics')->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY))
            ->add(Url::create('/articles'))
            ->add(Url::create('/publishers')->setChangeFrequency(Url::CHANGE_FREQUENCY_YEARLY));


        Topic::all()->each(function (Topic $topic) use ($sitemap) {
            $sitemap->add(Url::create("/topics/{$topic->id}"));
        });

        Publisher::all()->each(function (Publisher $publisher) use ($sitemap) {
            $sitemap->add(Url::create("/publishers/{$publisher->id}"));
        });

        Article::all()->each(function (Article $article) use ($sitemap) {
            $sitemap->add(Url::create("/articles/{$article->id}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));

        return CommandAlias::SUCCESS;
    }
}
