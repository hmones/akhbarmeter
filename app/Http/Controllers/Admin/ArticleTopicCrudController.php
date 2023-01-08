<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\ArticleTopicRequest;
use App\Models\ArticleTopic;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class ArticleTopicCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(ArticleTopic::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/article-topic');
        CRUD::setEntityNameStrings('article topic', 'article topics');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('icon');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(ArticleTopicRequest::class);

        CRUD::field('title');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins'        => 'resize,maximize',
        ]);
        CRUD::field('icon');
    }
}
