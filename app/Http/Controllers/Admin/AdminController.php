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
        return view("pages.admin.$this->modelPlural.index", [$this->modelPlural => $this->modelClass::paginate(25)]);
    }

    public function store()
    {
        $request = resolve($this->requestClass);

        $this->modelClass::create($request->safe()->toArray());

        return redirect()->route("admin.$this->modelPlural.index")->with('success', 'Record is created successfully!');
    }

    public function create(): View
    {
        return view("pages.admin.$this->modelPlural.edit");
    }

    public function edit($model): View
    {
        $model = resolve($this->modelClass)->findOrFail($model);

        return view("pages.admin.$this->modelPlural.edit", compact('model'));
    }

    public function update($model)
    {
        $request = resolve($this->requestClass);
        $model = resolve($this->modelClass)->findOrFail($model);
        $model->update($request->safe()->toArray());

        return redirect()->route("admin.$this->modelPlural.index")->with('success', 'Record is updated successfully!');
    }

    public function destroy($model)
    {
        $model = resolve($this->modelClass)->findOrFail($model);
        $model->delete();

        return redirect()->route("admin.$this->modelPlural.index")->with('success', 'Record is deleted successfully!');
    }
}
