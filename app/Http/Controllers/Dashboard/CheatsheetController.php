<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Dashboard\CheatsheetRequest;
use App\Models\Cheatsheet;
use App\Models\Course;

class CheatsheetController extends Controller
{
    public function index()
    {
        $cheatsheets = Cheatsheet::all();

        return view('dashboard.cheatsheets.index', compact('cheatsheets'));
    }

    public function create()
    {
        $courses = Course::all();

        return view('dashboard.cheatsheets.create', compact('courses'));
    }

    public function store(CheatsheetRequest $request)
    {
        Cheatsheet::create($request->validated());

        return to_route('dashboard.cheatsheets.index')->with('success', __('messages.dashboard.cheatsheets.created'));
    }

    public function edit(Cheatsheet $cheatsheet)
    {
        $courses = Course::all();

        return view('dashboard.cheatsheets.edit', compact(['cheatsheet', 'courses']));
    }

    public function update(CheatsheetRequest $request, Cheatsheet $cheatsheet)
    {
        $cheatsheet->update($request->validated());

        return to_route('dashboard.cheatsheets.index')->with('success', __('messages.dashboard.cheatsheets.updated'));
    }

    public function destroy(Cheatsheet $cheatsheet)
    {
        $cheatsheet->delete();

        return to_route('dashboard.cheatsheets.index')->with('success', __('messages.dashboard.cheatsheets.deleted'));
    }
}
