<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Personnel;

class Etablissement extends Model
{
    protected $primaryKey = 'id_etab';

    protected $fillable = [
        'nom',
        'ville'
    ];

    public function personnels()
    {
        return $this->hasMany(Personnel::class, 'id_etab');
    }
}
