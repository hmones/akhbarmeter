<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TagRequest;
use App\Models\Tag;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

class TagCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Tag::class);
        CRUD::setRoute(config('backpack.base.route_prefix') . '/tag');
        CRUD::setEntityNameStrings('tag', 'tags');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('name');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TagRequest::class);

        CRUD::field('name');

    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    public function search(Request $request)
    {
        $term = $request->input('q');
        $tags = Tag::where('name', 'LIKE', '%' . $term . '%')->get(['id', 'name']);

        return response()->json($tags);
    }
}
