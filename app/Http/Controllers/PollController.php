<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $polls = $user->polls()->get();

        return view('polls/index', ['polls' => $polls]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('polls/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $title = $request->input('title');
        $question = $request->input('question');
        $description = $request->input('description');
        $poll = $user->polls()->create([
            'title' => $title,
            'question' => $question,
            'description' => $description,
        ]);
        return redirect()->route('polls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $poll = Poll::query()->where('id', $id)->first();

        return view('polls/show', ['poll' => $poll]);
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
