<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $user = $request->user();
        $new_responses = DB::table('responses')
            ->where('responses.created_at', '>', now()->subDays(1))
            ->join('polls', 'responses.poll_id', '=', 'polls.id')
            ->where('polls.user_id', '=', $user->id)
            ->select('responses.id')
            ->count();

        return view('home', [
            'new_responses' => $new_responses,
        ]);
    }
}
