<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\PublisherScoreRequest;
use App\Jobs\CalculateRankForPublishers;
use App\Models\PublisherScore;
use Backpack\CRUD\app\Http\Controllers\CrudController;
use Backpack\CRUD\app\Http\Controllers\Operations\CreateOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\DeleteOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ListOperation;
use Backpack\CRUD\app\Http\Controllers\Operations\ShowOperation;
use Backpack\CRUD\app\Library\CrudPanel\CrudPanelFacade as CRUD;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Carbon;

class PublisherScoreCrudController extends CrudController
{
    use ListOperation;
    use CreateOperation {
        store as traitStore;
    }
    use DeleteOperation;
    use ShowOperation;

    public function setup(): void
    {
        CRUD::setModel(PublisherScore::class);
        CRUD::setRoute(config('backpack.base.route_prefix').'/publisher-score');
        CRUD::setEntityNameStrings('publisher score', 'publisher scores');
    }

    public function store(): RedirectResponse
    {
        $this->crud->hasAccessOrFail('create');
        $request = $this->crud->validateRequest();
        $this->crud->registerFieldEvents();

        CalculateRankForPublishers::dispatch(
            Carbon::parse($request->from),
            $request->period ?? PublisherScore::PERIOD_WEEK
        );

        return redirect()->route('publisher-score.index')->with('success', trans('backpack::crud.insert_success'));
    }

    protected function setupListOperation(): void
    {
        CRUD::column('publisher')->type('relationship')->attribute('name');
        CRUD::column('from');
        CRUD::column('to');
        CRUD::column('period')->type('select_from_array')->options([
            PublisherScore::PERIOD_WEEK => 'Week',
            PublisherScore::PERIOD_MONTH => 'Month',
            PublisherScore::PERIOD_YEAR => 'Year',
        ]);
        CRUD::column('articles_count');
        CRUD::column('score');
        CRUD::column('rank');
        CRUD::column('is_trending');
        CRUD::column('created_at');
    }

    protected function setupCreateOperation(): void
    {
        CRUD::setValidation(PublisherScoreRequest::class);

        CRUD::field('from')->type('date')->label('Calculate starting from:');
        CRUD::field('period')
            ->type('select_from_array')
            ->options([
                PublisherScore::PERIOD_WEEK => 'Week',
                PublisherScore::PERIOD_MONTH => 'Month',
                PublisherScore::PERIOD_YEAR => 'Year',
            ]);
    }
}
