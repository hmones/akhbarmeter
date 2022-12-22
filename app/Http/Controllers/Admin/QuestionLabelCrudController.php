<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionLabelRequest;
use App\Models\QuestionLabel;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\InlineCreateOperation;

class QuestionLabelCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;
    use InlineCreateOperation;

    public function setup(): void
    {
        CRUD::setModel(QuestionLabel::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/question-label');
        CRUD::setEntityNameStrings('question label', 'question labels');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('icon');
        CRUD::column('color');
        CRUD::column('priority');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(QuestionLabelRequest::class);

        CRUD::field('title');
        CRUD::field('icon');
        CRUD::field('color')->type('enum')->options(QuestionLabel::COLORS);
        CRUD::field('priority');
    }
}
