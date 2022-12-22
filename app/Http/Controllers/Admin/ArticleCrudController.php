<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleRequest;
use App\Http\Requests\ArticleUpdateRequest;
use App\Models\Article;
use App\Models\ArticleTopic;
use App\Models\ArticleType;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ArticleCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Article::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article');
        CRUD::setEntityNameStrings('article', 'articles');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('date');
        CRUD::column('url');
        CRUD::column('author');
        CRUD::column('active');
        CRUD::column('type')->type('relationship')->attribute('title');
        CRUD::column('topic')->type('relationship')->attribute('title');
        CRUD::column('user')->type('relationship')->attribute('name');
        CRUD::column('is_fake');
    }

    protected function setupUpdateOperation(): void
    {
        CRUD::setValidation(ArticleUpdateRequest::class);

        CRUD::field('active');
        CRUD::field('title');
        CRUD::field('date');
        CRUD::field('image')->type('upload')->upload(true);
        CRUD::field('content')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins'        => 'resize,maximize',
        ]);
        CRUD::field('author');
        CRUD::field('comment');
        CRUD::field('publisher')->type('relationship')->attributes(['readonly' => 'readonly']);
        CRUD::field('user')->type('relationship')->attribute('name');
        CRUD::field('type')->type('relationship')->attribute('title')->model(ArticleType::class);
        CRUD::field('topic')->type('relationship')->attribute('title')->model(ArticleTopic::class);
        CRUD::field('is_fake');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ArticleRequest::class);

        CRUD::field('user')->type('relationship')->attribute('name')->label('Which user should review the article?');
        CRUD::field('type')->type('relationship')->attribute('title')->model(ArticleType::class);
        CRUD::field('topic')->type('relationship')->attribute('title')->model(ArticleTopic::class);
        CRUD::field('url');
    }
}
