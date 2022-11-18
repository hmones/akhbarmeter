<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class AdminController extends Controller
{
    protected $modelClass;
    protected $modelPlural;
    protected $requestClass;

    public function index(): View
    {
        return view("pages.admin.$this->modelPlural.index", [
            $this->modelPlural => $this->modelClass::orderBy('created_at', 'desc')->paginate(25)
        ]);
    }

    public function store()
    {
        $this->modelClass::create(resolve($this->requestClass)->safe()->toArray());

        return redirect()->route("admin.$this->modelPlural.index")->with('success', 'Record is created successfully!');
    }

    public function create(): View
    {
        return view("pages.admin.$this->modelPlural.edit", ['model' => resolve($this->modelClass)]);
    }

    public function edit($model): View
    {
        return view("pages.admin.$this->modelPlural.edit", [
            'model' => resolve($this->modelClass)->findOrFail($model)
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
