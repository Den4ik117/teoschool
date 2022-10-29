<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\PartRequest;
use App\Models\Module;
use App\Models\Part;

class PartController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Part::class);
    }

    public function index(Module $module)
    {
        $parts = $module->parts;

        return view('dashboard.parts.index', compact(['module', 'parts']));
    }

    public function create(Module $module)
    {
        return view('dashboard.parts.create', compact('module'));
    }

    public function store(PartRequest $request, Module $module)
    {
        $module->parts()->create($request->validated());

        return to_route('dashboard.modules.parts.index', $module->id)->with('success', __('messages.dashboard.modules.parts.created'));
    }

    public function edit(Part $part)
    {
        return view('dashboard.parts.edit', compact('part'));
    }

    public function update(PartRequest $request, Part $part)
    {
        $part->update($request->validated());

        return to_route('dashboard.modules.parts.index', $part->module_id)->with('success', __('messages.dashboard.modules.parts.updated'));
    }

    public function destroy(Part $part)
    {
        $part->delete();

        return to_route('dashboard.modules.parts.index', $part->module_id)->with('success', __('messages.dashboard.modules.parts.deleted'));
    }
}
