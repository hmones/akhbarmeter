<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PublicationRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class PublicationCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(\App\Models\Publication::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/publication');
        CRUD::setEntityNameStrings('publication', 'publications');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('created_at');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(PublicationRequest::class);

        CRUD::field('title');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight' => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize',
        ]);
        CRUD::field('image')->type('upload')->upload(true);
        CRUD::field('file')->type('upload')->upload(true);
        CRUD::field('tags');
        CRUD::field('author_name');
        CRUD::field('author_avatar')->type('upload')->upload(true);
        CRUD::field('min_to_read');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
