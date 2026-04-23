<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Specialite extends Model
{
    protected $primaryKey = 'idSpecialite';

    public function personnels()
    {
        return $this->belongsToMany(
            Personnel::class,
            'enseigner',
            'idSpecialite',
            'idPersonnel'
        );
    }
}
