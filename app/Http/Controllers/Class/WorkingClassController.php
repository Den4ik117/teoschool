<?php

namespace App\Http\Controllers\Class;

use App\Http\Controllers\Controller;
use App\Models\WorkingClass;
use Illuminate\Http\Request;

class WorkingClassController extends Controller
{
    public function show(Request $request, $uuid)
    {
        $wClass = WorkingClass::with(['persons'])->where('uuid', $uuid)->firstOrFail();
        $user = $request->user()->with(['person'])->first();

        return view('class.classes.show', compact(['user', 'wClass']));
    }
}
