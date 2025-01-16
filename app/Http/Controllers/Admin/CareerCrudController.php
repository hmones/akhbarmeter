<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\CareerRequest;
use App\Models\Career;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class CareerCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class CareerCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Career::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/career');
        CRUD::setEntityNameStrings('career', 'careers');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('sub_title');
        CRUD::column('type');
        CRUD::column('location');
        CRUD::column('status');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(CareerRequest::class);

        CRUD::field('title');
        CRUD::field('sub_title')
            ->label('About the job');
        CRUD::field('type');
        CRUD::field('location');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize'
        ]);
        CRUD::field('status');
        CRUD::field('status')->type('select_from_array')->options(Career::STATUSES);
    }

    /**
     * Define what happens when the Update operation is loaded.
     *
     * @see https://backpackforlaravel.com/docs/crud-operation-update
     * @return void
     */
    protected function setupUpdateOperation()
    {
        $this->setupCreateOperation();
    }
}
