<?php

namespace App\Http\Controllers;

use App\Models\Option;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class OptionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $user = $request->user();
        $options = Option::query()->where(['user_id' => $user->id])->orWhere(['user_id' => null])->get();

        return view('options.index', [
            'options' => $options,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('options.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->user();
        $value = $request->input('value');
        $user->options()->create(['value' => $value]);

        return redirect()->route('options.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, string $id)
    {
        $user = $request->user();
        $option = Option::query()->where(['id' => $id])->where(function (Builder $query) use ($user) {
            $query->where(['user_id' => $user->id])->orWhere(['user_id' => null]);
        })->first();

        return view('options.show', [
            'option' => $option,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, string $id)
    {
        $user = $request->user();
        $option = $user->options()->where(['id' => $id])->first();

        return view('options.edit', [
            'option' => $option,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = $request->user();
        $value = $request->input('value');
        $user->options()->where(['id' => $id])->update([
            'value' => $value,
        ]);

        return redirect()->route('options.show', ['option' => $id]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        $user = $request->user();
        $user->options()->where(['id' => $id])->delete();

        return redirect()->route('options.index');
    }
}
