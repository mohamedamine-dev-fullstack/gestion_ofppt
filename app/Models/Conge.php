<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conge extends Model
{
    
    protected $primaryKey = 'id_conge';

    protected $fillable = [ 
        'date_debut',
        'date_fin',
        'type_conge'
    ];

    
    public function administratif()
    {
        return $this->belongsTo(Administratif::class, 'id_personnel');
    }
    
}
