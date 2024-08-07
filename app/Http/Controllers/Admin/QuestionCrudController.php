<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\QuestionRequest;
use App\Models\Question;
use App\Models\QuestionLabel;
use App\Models\QuestionOption;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\UpdateOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Backpack\Pro\Http\Controllers\Operations\FetchOperation;

class QuestionCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation;
    use UpdateOperation;
    use DeleteOperation;
    use ShowOperation;
    use FetchOperation;

    protected array $weightOptions = [
        Question::PROFESSIONALISM_WEIGHT => 'Professionalism',
        Question::CREDIBILITY_WEIGHT => 'Credibility',
        Question::HUMAN_RIGHTS_WEIGHT => 'Human Rights',
    ];

    public function fetchQuestionLabel()
    {
        return $this->fetch([
            'model' => QuestionLabel::class,
            'searchable_attributes' => ['title'],
            'data_source' => backpack_url('question/fetch/question-label'),
        ]);
    }

    public function fetchQuestionOption()
    {
        return $this->fetch([
            'model' => QuestionOption::class,
            'searchable_attributes' => ['title'],
            'data_source' => backpack_url('question/fetch/question-option'),
        ]);
    }

    public function setup(): void
    {
        CRUD::setModel(Question::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/question');
        CRUD::setEntityNameStrings('question', 'questions');
    }

    protected function setupListOperation(): void
    {
        CRUD::column('title');
        CRUD::column('weight')->type('select_from_array')->options($this->weightOptions);
        CRUD::column('label')->type('relationship')->attribute('title');
        CRUD::column('active');
    }

    protected function setupUpdateOperation(): void
    {
        $this->setupCreateOperation();
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(QuestionRequest::class);

        CRUD::field('title');
        CRUD::field('description');
        CRUD::field('hint');
        CRUD::field('weight')->type('select_from_array')->options($this->weightOptions)->allows_null(false);
        CRUD::field('label')->type('relationship')->attribute('title')->model(QuestionLabel::class);
        CRUD::addField([
            'type' => 'relationship',
            'name' => 'options',
            'ajax' => true,
            'subfields' => [
                [
                    'name' => 'title',
                    'type' => 'text',
                    'wrapper' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                [
                    'name' => 'description',
                    'type' => 'textarea',
                    'wrapper' => [
                        'class' => 'form-group col-md-6',
                    ],
                ],
                [
                    'name' => 'weight',
                    'type' => 'enum',
                    'options' => [
                        QuestionOption::NO_MISTAKE => 'No mistake',
                        QuestionOption::MISTAKE => 'A Mistake',
                    ],
                    'label' => 'What does this option represent?',
                ],
                [
                    'name' => 'selected',
                    'type' => 'checkbox',
                    'label' => 'Selected by default?',
                ],
                [
                    'name' => 'is_not_applicable',
                    'type' => 'checkbox',
                    'label' => 'Does this option represents a not-applicable?',
                ],
            ],
            'attribute' => 'title',
            'force_delete' => true,
        ]);
        CRUD::field('active');
        CRUD::field('order');
    }
}
