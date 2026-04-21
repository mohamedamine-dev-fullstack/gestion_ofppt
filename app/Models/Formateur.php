<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\FormateurPermanent;
use App\Models\Personnel;

class Formateur extends Model
{

    protected $primaryKey = 'id_personnel';
    public $incrementing = false;

    protected $fillable = ['id_personnel'];

    public function personnel()
    {
        return $this->belongsTo(Personnel::class, 'id_personnel');
    }

    public function permanent()
    {
        return $this->hasOne(FormateurPermanent::class, 'id_personnel');
    }

    public function vacataire()
    {
        return $this->hasOne(FormateurVacataire::class, 'id_personnel');
    }

}
