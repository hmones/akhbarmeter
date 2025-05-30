<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TeamRequest;
use App\Models\TeamMember;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

class TeamMemberCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(TeamMember::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/team-member');
        CRUD::setEntityNameStrings('team', 'teams');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('first_name');
        CRUD::column('last_name');
        CRUD::column('job_title');
        CRUD::column('linked_in');
        CRUD::column('email');
        CRUD::column('active');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TeamRequest::class);

        CRUD::field('first_name');
        CRUD::field('last_name');
        CRUD::field('job_title');
        CRUD::field('bio')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize'
        ]);
        CRUD::field('image')
            ->type('upload')
            ->upload(true)
            ->path('/')
            ->disk(config('filesystems.default'));
        CRUD::field('linked_in');
        CRUD::field('email');
        CRUD::field('active');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }
}
