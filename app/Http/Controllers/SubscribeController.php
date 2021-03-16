<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SubscribeRequest;
use App\Models\Subscribe;

class SubscribeController extends Controller
{
    public function subscribe(SubscribeRequest $request)
    {
        Subscribe::create(['email' => $request->email]);

        return back()->with(['success' => 'Вы успешно подписались на нашу рассылку!']);
    }
}
