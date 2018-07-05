<?php

namespace App\Http\Controllers;

use App\Partida;
use App\Campeonato;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request, $serieId)
    {
        $games = Partida::where('campeonato_id', $serieId)
            ->orderBy('game_date', 'desc')
            ->paginate(5);
        // latest('game_date')->paginate(5);
        return view('game.index', compact('games'))
                ->with(
                    [
                    'i' => (request()->input('page', 1) - 1) * 5,
                    'serieId' => $serieId
                    ]
                );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($serieId)
    {
        $serie = Campeonato::find($serieId);
        return view('game.create')
            ->with('serie', $serie);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $seriesId)
    {
        request()->validate(
            [
                'game_date' => 'required'
            ]
        );
        Partida::create($request->all());
        return redirect()->route('games.index', $seriesId)
            ->with('success', 'Game created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $serieId, int $id)
    {
        $serie = Campeonato::find($serieId);
        $game = Partida::find($id);
        return view('game.show', compact('game'))
            ->with('serie', $serie);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $serieId, int $id)
    {
        $serie = Campeonato::find($serieId);
        $game = Partida::find($id);
        return view('game.edit', compact('game', 'id'))
            ->with('serie', $serie);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$seriesId, $id)
    {
        request()->validate(
            [
                'game_date' => 'required'
            ]
        );
        $game = Partida::find($id);
        $game->update($request->all());
        return redirect()->route('games.index', $seriesId)
            ->with('success', 'Game updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($seriesId, $id)
    {
        $game = Partida::find($id);
        $game->delete();
        return redirect()->route('games.index', $seriesId)
            ->with('success', 'Game deleted successfully.');
    }
}
