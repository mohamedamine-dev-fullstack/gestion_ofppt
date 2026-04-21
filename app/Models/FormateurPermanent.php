<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Formateur;

class FormateurPermanent extends Model
{
    protected $primaryKey = 'id_personnel';
    public $incrementing = false;

    protected $fillable = [
        'id_personnel',
        'matricule',
        'date_recrutement',
        'grade',
        'echelon',
        'fonction'
    ];

    public function formateur()
    {
        return $this->belongsTo(Formateur::class, 'id_personnel');
    }

}
