<?php
namespace App\Services;

use App\Episodios;
use App\Events\SerieApagada;
use App\Jobs\ExcluirCapaSerie;
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
            $serieObj = (object) $serie->toArray();
            $nomeSerie = $serie->nome;

            $this->removerSerieETemporadas($serie);

            $evento = new SerieApagada($serieObj);
            event($evento);
            ExcluirCapaSerie::dispatch($serieObj);

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
