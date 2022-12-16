<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\VideoRequest;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;

/**
 * Class VideoCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class VideoCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(\App\Models\Video::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/video');
        CRUD::setEntityNameStrings('video', 'videos');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('url');
        CRUD::column('description');
        CRUD::column('icon');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(VideoRequest::class);

        CRUD::field('title');
        CRUD::field('url');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins'        => 'resize,maximize',
        ]);
        CRUD::field('tags');
        CRUD::field('icon');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
