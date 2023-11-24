<?php

namespace App\Http\Controllers;

use App\Http\Requests\PollStoreRequest;
use App\Http\Requests\PollUpdateRequest;
use App\Models\Option;
use App\Models\Poll;
use Illuminate\Http\Request;
use Throwable;

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

    private function extractOptions(Request $request)
    {
        $options = collect($request->keys())->filter(function ($key) {
            return str_starts_with($key, 'option-');
        })->mapWithKeys(function ($key) {
            $strippedKey = substr($key, strlen('option-'));
            // TODO: figure out how to get the order from the request
            $order = 1;

            return [$strippedKey => ['order' => $order]];
        })->toArray();

        return $options;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PollStoreRequest $request)
    {
        $user = $request->user();
        $title = $request->input('title');
        $question = $request->input('question');
        $description = $request->input('description');
        $options = $this->extractOptions($request);
        $poll = $user->polls()->create([
            'title' => $title,
            'question' => $question,
            'description' => $description,
        ]);
        try {
            $poll->options()->attach($options);
        } catch (Throwable $e) {
            abort(500);
        }

        return redirect()->route('polls.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $poll = Poll::where(['id' => $id])->with(['options', 'user'])->firstOrFail();
        } catch (Throwable $e) {
            abort(404);
        }

        if ($poll->user_id !== auth()->id() && $poll->closed()) {
            abort(404);
        }

        return view('polls/show', ['poll' => $poll]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $user = $request->user();
        try {
            $poll = $user->polls()->where('id', $id)->with('options')->firstOrFail();
        } catch (Throwable $e) {
            abort(404);
        }

        $poll_options = $poll->options()->get(['id']);
        $options = Option::all(['id', 'value']);
        $options = $options->map(function ($option) use ($poll_options) {
            $option->checked = $poll_options->contains($option->id);

            return $option;
        });

        return view('polls/edit', ['poll' => $poll, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PollUpdateRequest $request, string $id)
    {
        $user = $request->user();
        $title = $request->input('title');
        $question = $request->input('question');
        $description = $request->input('description');
        $closed = $request->input('closed') !== null;
        $options = $this->extractOptions($request);
        try {
            $poll = $user->polls()->where('id', $id)->firstOrFail();
        } catch (Throwable $e) {
            abort(404);
        }
        $poll->title = $title;
        $poll->question = $question;
        $poll->description = $description;
        $poll->options()->detach();
        $poll->options()->attach($options);
        $poll->closed_at = $closed ? now() : null;

        try {
            $poll->save();
        } catch (Throwable $e) {
            abort(500);
        }

        return redirect()->route('polls.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->user();
        try {
            $user->polls()->where('id', $id)->deleteOrFail();
        } catch (Throwable $e) {
            abort(404);
        }

        return redirect()->route('polls.index');
    }
}
