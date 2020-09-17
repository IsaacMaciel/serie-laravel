<?php
namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
    public function criarSerie(string $nomeSerie, int $qtdTemporadas, int $epTemporadas, ?string $capa): Serie
    {
        DB::beginTransaction();
        $serie = Serie::create(['nome' => $nomeSerie,
            'capa' => $capa]);
        $this->criaTemporadas($qtdTemporadas, $epTemporadas, $serie);
        DB::commit();

        return $serie;
    }

    private function criaTemporadas(int $qtdTemporadas, int $epPorTemporada, Serie $serie): void
    {
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' => $i]);

            $this->criaEpisodios($epPorTemporada, $temporada);
        }
    }

    private function criaEpisodios(int $epPorTemporada, Temporada $temporada)
    {
        for ($j = 1; $j <= $epPorTemporada; $j++) {
            $temporada->episodios()->create(['numero' => $j]);
        }
    }
}
