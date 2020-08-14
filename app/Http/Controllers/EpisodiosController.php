<?php

namespace App\Http\Controllers;

use App\Episodios;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        $episodios = $temporada->episodios;

        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'temporadaId' => $temporada->id,
            'mensagem' => $request->session()->get('mensagem'),
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {

        $episodiosAssistidos = $request->episodios;

        $temporada->episodios->each(function (Episodios $episodio) use ($episodiosAssistidos) {
            if ($episodiosAssistidos) {
                $episodio->assistido = in_array(
                    $episodio->id,
                    $episodiosAssistidos
                );
            } else {
                $episodio->assistido = false;
            }
        });
        $temporada->push();
        $request->session()->flash('mensagem', 'Episódios marcados como assistidos');

        return redirect()->back();
    }
}
