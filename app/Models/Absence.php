<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    protected $primaryKey = 'id_absence';

    protected $fillable = [
        'date_absence',
        'motif',
          
    ];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }
    
}