<?php

namespace App\Http\Controllers;

use App\Campeonato;
use Illuminate\Http\Request;

class SerieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $series = Campeonato::latest()->paginate(5);
        return view('serie.index', compact('series'))
                ->with('i', (request()->input('page', 1) - 1) * 5);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('serie.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'title' => 'required',
                'start_date' => 'required'
            ]
        );
        Campeonato::create($request->all());
        return redirect()->route('series.index')
            ->with('success', 'Serie created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $serie = Campeonato::find($id);
        return view('serie.show', compact('serie'));
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $serie = Campeonato::find($id);
        return view('serie.edit', compact('serie', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'title' => 'required',
                'start_date' => 'required'
            ]
        );
        $serie = Campeonato::find($id);
        $serie->update($request->all());
        return redirect()->route('series.index')
            ->with('success', 'Serie updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $serie = Campeonato::find($id);
        $serie->delete();
        return redirect()->route('series.index')
            ->with('success', 'Serie deleted successfully.');
    }
}
