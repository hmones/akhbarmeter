<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\StoreFactCheckingArticleRequest;
use App\Models\FactCheckingArticle;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Support\Facades\Http;

class FactCheckingArticleCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(FactCheckingArticle::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/fact-checking-article');
        CRUD::setEntityNameStrings('fact-checking-article', 'fact-checking-articles');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('dbid');
        CRUD::column('claim_description');
        CRUD::column('title');
        CRUD::column('summary');
        CRUD::removeButton('update');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(StoreFactCheckingArticleRequest::class);
        CRUD::field('claim_description');
        CRUD::field('title');
        CRUD::field('summary');
        FactCheckingArticle::creating(function ($article) {
            // Define the GraphQL mutation
            $query = [
                'mutation' => [
                    'createProjectMedia' => [
                        'input' => [
                            'media_type' => 'Blank',
                            'set_status' => 'undetermined',
                            'set_claim_description' => $article->claim_description,
                            'set_fact_check' => [
                                'title' => $article->title,
                                'summary' => $article->summary,
                                'language' => 'ar',
                            ],
                        ],
                        'project_media' => [
                            'claim_description' => [
                                'fact_check' => [
                                    'dbid',
                                ],
                            ],
                        ],
                    ],
                ],
            ];

            // Make the POST request
            $response = Http::asJson()->withHeaders(['X-Check-Token' => config('services.check-api.token')])
                ->post(config('services.check-api.url'), compact('query'))
                ->json();

            // Extract the dbid value
            $dbid = data_get($response, 'data.createProjectMedia.project_media.claim_description.fact_check.dbid');

            // Fail if dbid can not be found
            if (! $dbid) {
                abort(500, 'Failed to create fact-checking article'.json_encode(compact('response')));
            }

            // Assign the dbid to the article
            $article->dbid = $dbid;
        });
    }
}
