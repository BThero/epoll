<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $polls = $user->polls()->get();

        return view('home', [
            'polls' => $polls,
        ]);
    }
}
