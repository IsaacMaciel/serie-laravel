<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];

    public function episodios()
    {
        return $this->hasMany(Episodios::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
