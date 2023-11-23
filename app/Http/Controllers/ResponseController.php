<?php

namespace App\Http\Controllers;

use App\Http\Requests\ResponseStoreRequest;
use Illuminate\Http\Request;
use Throwable;

class ResponseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $responses = $request->user()->responses()->get('id');

        return view('responses.index', ['responses' => $responses]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ResponseStoreRequest $request)
    {
        $user = $request->user();
        $poll_id = $request->input('poll_id');
        $option_id = $request->input('option_id');

        try {
            $user->responses()->create([
                'poll_id' => $poll_id,
                'option_id' => $option_id,
            ]);
        } catch (Throwable $e) {
            abort(500);
        }

        return redirect()->route('responses.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->user();
        try {
            $response = $user->responses()->where('id', $id)->with(['poll', 'option'])->firstOrFail();
        } catch (Throwable $e) {
            abort(404);
        }

        return view('responses.show', ['response' => $response]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
