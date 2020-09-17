<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = ['nome', 'capa'];

    public function getCapaUrlAttribute()
    {
        return 'http://localhost:8000/storage/' . $this->capa;
    }

    public function temporadas()
    {
        return $this->hasMany(Temporada::class);
    }
}
