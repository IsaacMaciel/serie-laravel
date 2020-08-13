<?php
namespace App\Services;

use App\Episodios;
use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $idSerie): string
    {
        $nomeSerie = '';
        DB::transaction(function () use ($idSerie, &$nomeSerie) {
            $serie = Serie::find($idSerie);
            $nomeSerie = $serie->nome;

            $this->removerSerieETemporadas($serie);


        });

        return $nomeSerie;
    }

    public function removerSerieETemporadas($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios()->each(function (Episodios $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
            $serie->delete();

    }
}
