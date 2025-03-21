<?php

namespace App\Http\Controllers\Admin;

use App\Models\FactCheckingMethodology;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class FactCheckingMethodologyCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(FactCheckingMethodology::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/fact-checking-methodology');
        CRUD::setEntityNameStrings('fact checking methodology', 'fact checking methodologies');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('description');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(['description' => 'required']);
        CRUD::field('description')
            ->type('ckeditor')
            ->options([
                'autoGrow_minHeight' => 200,
                'autoGrow_bottomSpace' => 50
            ]);
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
