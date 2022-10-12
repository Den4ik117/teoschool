<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Information::class);
    }

    public function index()
    {
        $information = Information::all();

        return view('dashboard.information.index', compact('information'));
    }

    public function create()
    {
        return view('dashboard.information.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:255',
            'image' => 'required|image',
            'content' => 'required|string'
        ]);

        Information::create([
            'title' => $request->input('title'),
            'image' => $request->file('image')->store('images/information'),
            'content' => $request->input('content')
        ]);

        return to_route('dashboard.information.index')->with('success', __('messages.dashboard.information.created'));
    }

    public function edit(Information $information)
    {
        return view('dashboard.information.edit', compact('information'));
    }

    public function update(Request $request, Information $information)
    {
        $request->validate([
            'title' => 'required|string|min:4|max:255',
            'image' => 'nullable|image',
            'content' => 'required|string'
        ]);

        $information->update([
            'title' => $request->input('title'),
            'image' => $request->hasFile('image') ? $request->file('image')->store('images/information') : $information->image,
            'content' => $request->input('content')
        ]);

        return to_route('dashboard.information.index')->with('success', __('messages.dashboard.information.updated'));
    }

    public function destroy(Information $information)
    {
        $information->delete();

        return to_route('dashboard.information.index')->with('success', __('messages.dashboard.information.deleted'));
    }
}
