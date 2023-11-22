<?php

namespace App\Http\Controllers;

use App\Models\Option;
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
        $options = Option::all(['id', 'value']);
        return view('polls/create', [
            'options' => $options,
        ]);
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
        $options = collect($request->keys())->filter(function ($key) {
            return str_starts_with($key, 'option-');
        })->mapWithKeys(function ($key) {
            $strippedKey = substr($key, strlen('option-'));
            // TODO: figure out how to get the order from the request
            $order = 1;
            return [$strippedKey => ['order' => $order]];
        })->toArray();
        $poll = $user->polls()->create([
            'title' => $title,
            'question' => $question,
            'description' => $description,
        ]);
        $poll->options()->attach($options);

        return redirect()->route('polls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->user();
        $poll = $user->polls()->where('id', $id)->with('options')->first();

        return view('polls/show', ['poll' => $poll]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $user = $request->user();
        $poll = $user->polls()->where('id', $id)->first();

        return view('polls/edit', ['poll' => $poll]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->user();
        $title = $request->input('title');
        $question = $request->input('question');
        $description = $request->input('description');
        $user->polls()->where('id', $id)->update([
            'title' => $title,
            'question' => $question,
            'description' => $description,
        ]);

        return redirect()->route('polls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->user();
        $user->polls()->where('id', $id)->delete();

        return redirect()->route('polls.index');
    }
}
