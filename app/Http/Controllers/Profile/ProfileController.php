<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(Request $request, $slug)
    {
        $user = User::where('slug', $slug)->firstOrFail();

        return view('profile.index', compact('user'));
    }
}
