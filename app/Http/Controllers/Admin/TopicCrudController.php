<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopicRequest;
use App\Models\Topic;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;

/**
 * Class TopicCrudController
 * @package App\Http\Controllers\Admin
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class TopicCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Topic::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/topic');
        CRUD::setEntityNameStrings('topic', 'topics');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('image')->type('image')->disk(config('filesystems.default'));
        CRUD::column('author_name');
        CRUD::column('author_avatar')->type('image')->disk(config('filesystems.default'));
        CRUD::column('type');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TopicRequest::class);
        CRUD::field('title');
        CRUD::field('description')->type('ckeditor')->options([
            'autoGrow_minHeight'   => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins'        => 'resize,maximize',
        ]);
        CRUD::field('image')->type('upload')->upload(true);
        CRUD::field('tags');
        CRUD::field('author_name');
        CRUD::field('author_avatar')->type('upload')->upload(true);
        CRUD::field('type')->type('select_from_array')->options(Topic::TYPES);
    }
}
