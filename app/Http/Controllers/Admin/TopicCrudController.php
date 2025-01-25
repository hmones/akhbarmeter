<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\TopicRequest;
use App\Models\Tag;
use App\Models\TeamMember;
use App\Models\Topic;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\Request;

class TopicCrudController extends CrudController
{
    use ListOperation, CreateOperation, UpdateOperation, DeleteOperation, ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(Topic::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/topic');
        CRUD::setEntityNameStrings('topic', 'topics');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('description');
        CRUD::column('type');
        CRUD::column('teamMember.first_name')
            ->type('text')
            ->label('Author');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(TopicRequest::class);
        CRUD::field('title');
        CRUD::field('sub_title');
        CRUD::field('slug')
            ->type('slug')
            ->label('Slug (used for building links, only in english)')
            ->target('title');
        CRUD::field('description')
            ->type('ckeditor')
            ->options([
            'autoGrow_minHeight' => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize'
        ]);

        CRUD::field('tags')
            ->type('select2_from_ajax_multiple')
            ->label('Tags')
            ->placeholder('Search and select tags')
            ->data_source(backpack_url('tag/search'))
            ->model(Tag::class)
            ->attribute('name')
            ->minimumInputLength(1)
            ->pivot(true);

        CRUD::field('team_member_id')
            ->type('select')
            ->label('Team Member')
            ->entity('teamMember')
            ->model(TeamMember::class)
            ->attribute('first_name');
        CRUD::field('claim_reference')
            ->label('Claim Reference')
            ->type('repeatable')
            ->fields([
                [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                ],
                [
                    'name' => 'url',
                    'label' => 'URL',
                    'type' => 'url',
                ],
            ]);
        CRUD::field('fact_check_reference')
            ->label('Fact Check Reference')
            ->type('repeatable')
            ->fields([
                [
                    'name' => 'name',
                    'label' => 'Name',
                    'type' => 'text',
                ],
                [
                    'name' => 'url',
                    'label' => 'URL',
                    'type' => 'url',
                ],
            ]);
        CRUD::field('legal_statement')->type('ckeditor')->options([
            'autoGrow_minHeight' => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize',
        ]);
        CRUD::field('correction_statement')->type('ckeditor')->options([
            'autoGrow_minHeight' => 200,
            'autoGrow_bottomSpace' => 50,
            'removePlugins' => 'resize,maximize',
        ]);
        CRUD::field('type')->type('select_from_array')->options(Topic::TYPES);
        CRUD::field('published_at');
        CRUD::field('active');
    }
}
