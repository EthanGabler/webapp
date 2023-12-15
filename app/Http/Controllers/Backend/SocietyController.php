<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Http\Requests\SocietyStoreRequest;
use App\Models\Society;


class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $societies = Society::where('user_id', auth()->id())->paginate(5)->through(fn($society) => [
            'id' => $society->id,
            'name' => $society->name,
            'description' => $society->description,
            'slug' => $society->slug,
        ]);


        return Inertia::render('Societies/Index', compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Societies/Create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(SocietyStoreRequest $request)
    {
        $society = Society::create($request->validated() + ['user_id' => auth()->id()]);

        return to_route('societies.index');

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
    public function edit(Society $society)
    {
        return Inertia::render('Societies/Edit', compact('society'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(SocietyStoreRequest $request, Society $society)
    {
        $society->update($request->validated());

        return to_route('societies.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Society $society)
    {
        $society->destroy();
    }
}
