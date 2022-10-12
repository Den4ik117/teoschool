<?php

namespace App\Http\Controllers;

use App\Http\Resources\InformationResource;
use App\Models\Information;
use Illuminate\Http\Request;

class InformationController extends Controller
{
    public function __invoke(Request $request)
    {
        return InformationResource::collection(Information::all());
    }
}
