<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormateurVacataire extends Model
{
    
    protected $primaryKey = 'id_personnel';
    public $incrementing = false;

    protected $fillable = [
        'id_personnel',
        'specialite_enseignee'
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'id_personnel');
    }

}
