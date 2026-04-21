<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Administratif extends Model
{

    protected $primaryKey = 'id_personnel';
    public $incrementing = false;

    protected $fillable = [
        'id_personnel',
        'matricule',
        'date_recrutement',
        'grade',
        'echelon',
        'fonction',
        'id_conge'
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }

    public function user()
    {
        return $this->hasOne(User::class, 'id_personnel');
    }

      public function conge()
    {
        return $this->hasMany(conge::class, 'id_absence');
    }
}

