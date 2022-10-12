<?php

namespace App\Http\Controllers;

use App\Http\Resources\CheatsheetResource;
use App\Models\Cheatsheet;
use Illuminate\Http\Request;

class CheatsheetController extends Controller
{
    public function __invoke(Request $request)
    {
        if ($request->has('search') && trim($request->input('search')) !== '')
            $cheatsheets = Cheatsheet::where('name', 'like', '%'. $request->input('search') .'%')->with('course')->get();
        else
            $cheatsheets = Cheatsheet::with('course')->get();

        return CheatsheetResource::collection($cheatsheets);
    }
}
