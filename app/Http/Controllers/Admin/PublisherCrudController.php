<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PublisherRequest;
use App\Models\Publisher;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PublisherCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Publisher::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/publisher');
        CRUD::setEntityNameStrings('publisher', 'publishers');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('image')->type('image')->disk(config('filesystems.default'));
        CRUD::column('name');
        CRUD::column('url');
        CRUD::column('active');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(PublisherRequest::class);

        CRUD::field('name');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins'        => 'resize,maximize',
        ]);
        CRUD::field('url');
        CRUD::field('image')->type('upload')->upload(true);
        CRUD::field('hashtags');
        CRUD::field('active');
        CRUD::field('title_xpath');
        CRUD::field('content_xpath');
        CRUD::field('image_xpath');
        CRUD::field('author_xpath');

    }
}
