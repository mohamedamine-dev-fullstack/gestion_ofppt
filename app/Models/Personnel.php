<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Etablissement;
use App\Models\Diplome;
use App\Models\Specialite;
use App\Models\Absence;
use App\Models\Conge;

class Personnel extends Model
{
    protected $table = 'personnels';
    protected $primaryKey = 'idPersonnel';

    protected $fillable = [
        'CIN','nom','prenom','date_naissance','situation_familiale',
        'adresse','telephone','type_personnel','statut',
        'grade','echelon','fonction','contact_nom','contact_telephone',
        'idEtab','idSpecialiteOrigine'
    ];

    public function etablissement()
    {
        return $this->belongsTo(Etablissement::class, 'idEtab');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'idPersonnel');
    }

    public function absences()
    {
        return $this->hasMany(Absence::class, 'idPersonnel');
    }

    public function conges()
    {
        return $this->hasMany(Conge::class, 'idPersonnel');
    }

    public function diplomes()
    {
        return $this->belongsToMany(Diplome::class, 'obtenir', 'idPersonnel', 'idDiplome');
    }

    public function specialites()
    {
        return $this->belongsToMany(Specialite::class, 'enseigner', 'idPersonnel', 'idSpecialite');
    } 

}
