<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Throwable;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = auth()->user();
        $image = $user->getFirstMediaUrl('default', 'thumbnail');
        return view('profile.index', [
            'image' => $image,
        ]);
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
    public function store()
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    public function update(ProfileUpdateRequest $request, string $id)
    {
        $name = $request->input('name');
        $user = $request->user();
        $user->name = $name === null || strlen(trim($name)) === 0 ? null : trim($name);

        if ($request->hasFile('avatar')) {
            $user->clearMediaCollection('default');
            try {
                $user->addMediaFromRequest('avatar')->toMediaCollection();
            } catch (Throwable $e) {
                abort(500);
            }
        }

        try {
            $user->save();
        } catch (Throwable $e) {
            abort(500);
        }

        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
