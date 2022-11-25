<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    protected $modelClass;
    protected $modelPlural;
    protected $requestClass;
    protected $displayedFields = [];

    public function index(): View
    {
        return view("pages.admin.index", [
            'records'         => $this->modelClass::orderBy('created_at', 'desc')->paginate(25),
            'displayedFields' => $this->displayedFields,
            'modelPlural'     => $this->modelPlural
        ]);
    }

    public function store()
    {
        $this->modelClass::create(resolve($this->requestClass)->safe()->toArray());

        return redirect()->route("admin.$this->modelPlural.index")->with('success', 'Record is created successfully!');
    }

    public function create(): View
    {
        return view("pages.admin.edit", ['model' => resolve($this->modelClass), 'modelPlural' => $this->modelPlural]);
    }

    public function edit($model): View
    {
        return view("pages.admin.edit", [
            'model'       => resolve($this->modelClass)->findOrFail($model),
            'modelPlural' => $this->modelPlural
        ]);
    }

    public function update($model)
    {
        $model = resolve($this->modelClass)->findOrFail($model);
        $model->update(resolve($this->requestClass)->safe()->toArray());

        return redirect()->route("admin.$this->modelPlural.index")
            ->with('success', 'Record is updated successfully!');
    }

    public function destroy($model)
    {
        $model = resolve($this->modelClass)->findOrFail($model);
        $model->delete();

        return redirect()->route("admin.$this->modelPlural.index")
            ->with('success', 'Record is deleted successfully!');
    }
}
