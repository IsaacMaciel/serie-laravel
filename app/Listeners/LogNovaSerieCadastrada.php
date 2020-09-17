<?php

namespace App\Listeners;

use App\Events\NovaSerie;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class LogNovaSerieCadastrada implements ShouldQueue
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
     * @param  NovaSerie  $event
     * @return void
     */
    public function handle(NovaSerie $event)
    {
        //
        $nomeSerie = $event->nomeSerie;
        Log::info("Serie nova cadastrada: $nomeSerie");

    }
}
