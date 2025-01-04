<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\MediaRequest;
use App\Models\Media;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class MediaCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Media::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/media');
        CRUD::setEntityNameStrings('media', 'media');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('image')->type('image')->disk(config('filesystems.default'));
    }

    protected function setupCreateOperation(): void
    {
        $this->crud->setValidation(MediaRequest::class);

        CRUD::field('title');
        CRUD::field('image')
            ->type('upload')
            ->upload(true)
            ->path('uploads/images')
            ->disk(config('filesystems.default'));
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
