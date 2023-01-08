<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TranslationRequest;
use App\Models\Translation;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TranslationCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Translation::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/translation');
        CRUD::setEntityNameStrings('translation', 'translations');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('key');
        CRUD::column('page');
        CRUD::column('created_at');
        CRUD::column('updated_at');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TranslationRequest::class);
        CRUD::field('key');
        CRUD::field('page');
        CRUD::field('content');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
