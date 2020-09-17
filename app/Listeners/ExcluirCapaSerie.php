<?php

namespace App\Listeners;

use App\Events\SerieApagada;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class ExcluirCapaSerie implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SerieApagada  $event
     * @return void
     */
    public function handle(SerieApagada $event)
    {
        $serie = $event->serie;
        if ($serie->capa) {
            Storage::delete($serie->capa);
        }
    }
}
