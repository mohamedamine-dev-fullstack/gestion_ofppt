<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Diplome extends Model
{
    protected $table = 'diplomes';
    protected $primaryKey = 'idDiplome';
 
    protected $fillable = ['nom_diplome'];

    public function personnelsObtenus()
    {
        return $this->belongsToMany(Personnel::class, 'obtenir', 'idDiplome', 'idPersonnel');
    }

    public function enseignants()
    {
        return $this->belongsToMany(Personnel::class, 'enseigner', 'idDiplome', 'idPersonnel');
    }
    
    /*public function personnels()
    {
        return $this->belongsToMany(
            Personnel::class,
            'obtenir',
            'idDiplome',
            'idPersonnel'
        );
    }*/
}
