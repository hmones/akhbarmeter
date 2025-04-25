<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\GalleryRequest;
use App\Models\Gallery;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class GalleryCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation;

    public function setup(): void
    {
        CRUD::setModel(Gallery::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/gallery');
        CRUD::setEntityNameStrings('gallery', 'galleries');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('thumbnail');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(GalleryRequest::class);

        CRUD::field('title');
        CRUD::field('description')
            ->type('ckeditor')
            ->options([
                'autoGrow_minHeight' => 200,
                'autoGrow_bottomSpace' => 50
            ]);

        CRUD::field('thumbnail')
            ->type('upload')
            ->upload(true);

        CRUD::field('images')
            ->type('upload_multiple')
            ->label('Images')
            ->upload(true);
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
