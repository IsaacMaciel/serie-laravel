<?php

namespace App\Http\Controllers;

use App\Serie;

class TemporadasController extends Controller
{
    public function index(int $serieId)
    {
        $serie = Serie::find($serieId);
        $temporadas = $serie->temporadas;

        return view('temporadas.index',compact('serie','temporadas'));
    }
}
