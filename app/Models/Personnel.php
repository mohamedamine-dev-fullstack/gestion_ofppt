<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etablissement;
use App\Models\Formateur;

class Personnel extends Model
{
    protected $primaryKey = 'id_personnel';

    protected $fillable = [
        'nom',
        'prenom',
        'date_naissance',
        'lieu_naissance',
        'cin',
        'situation_familiale',
        'nombre_enfants',
        'telephone',
        'adresse_actuelle',
        'diplomes',
        'specialite_origine',
        'contact_nom',
        'contact_telephone',
        'id_etab',
        'id_absence'
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'id_etab');
    }

    public function formateur()
    {
        return $this->hasOne(Formateur::class, 'id_personnel');
    }

    public function administratif()
    {
        return $this->hasOne(Administratif::class, 'id_personnel');
    }

    /*public function conges()
    {
        return $this->hasMany(Conge::class, 'id_personnel');
    }
    */
    public function absences()
    {
        return $this->hasMany(Absence::class, 'id_absence');
    }

}
