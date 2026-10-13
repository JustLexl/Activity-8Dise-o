<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Superhero;

class SuperheroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $superheroes = Superhero::all();

        return view('superheroes.index', compact('superheroes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('superheroes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'real_name'       => 'required|max:150',
            'hero_name'       => 'required|max:150',
            'picture'         => 'required|url',
            'additional_info' => 'required',
        ]);

        Superhero::create($validatedData);

        return redirect()->route('superhero.index')->with('success', 'Superhero registered successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $superhero = Superhero::findOrFail($id);

        return view('superheroes.show', compact('superhero'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $superhero = Superhero::findOrFail($id);

        return view('superheroes.edit', compact('superhero'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'real_name'       => 'required|max:150',
            'hero_name'       => 'required|max:150',
            'picture'         => 'required|url',
            'additional_info' => 'required',
        ]);

        Superhero::whereId($id)->update($validatedData);

        return redirect()->route('superhero.index')->with('success', 'Superhero updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $superhero = Superhero::findOrFail($id);
        $superhero->delete();

        return redirect()->route('superhero.index')->with('success', 'Superhero unregistered successfully!');
    }
}
