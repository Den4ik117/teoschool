<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\ModuleRequest;
use App\Models\Course;
use App\Models\Module;

class ModuleController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Module::class);
    }

    public function index()
    {
        $modules = Module::with('course')->orderBy('course_id')->get();

        return view('dashboard.modules.index', compact('modules'));
    }

    public function create()
    {
        return view('dashboard.modules.create');
    }

    public function store(ModuleRequest $request)
    {
        Module::create($request->validated());

        return to_route('dashboard.modules.index')->with('success', __('messages.dashboard.modules.created'));
    }

    public function edit(Module $module)
    {
        $parts = $module->parts;

        return view('dashboard.modules.edit', compact(['module', 'parts']));
    }

    public function update(ModuleRequest $request, Module $module)
    {
        $module->update($request->validated());

        return to_route('dashboard.modules.index')->with('success', __('messages.dashboard.modules.updated'));
    }

    public function destroy(Module $module)
    {
        $module->delete();

        return to_route('dashboard.modules.index')->with('success', __('messages.dashboard.modules.deleted'));
    }
}
