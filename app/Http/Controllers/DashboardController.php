<?php

namespace App\Http\Controllers;

use App\Models\Personnel;
use App\Models\Conge;
use App\Models\Absence;
use App\Models\Diplome;
use App\Models\Specialite;
use App\Models\Etablissement;

class DashboardController extends Controller
{
    public function stats()
    {
        return response()->json([
            
            // totals
            'personnels_total' => Personnel::count(),
            'conges_total' => Conge::count(),
            'absences_total' => Absence::count(),
            'diplomes_total' => Diplome::count(),
            'specialites_total' => Specialite::count(),
            'etablissements_total' => Etablissement::count(),

            // breakdown
            'personnels_by_type' => [
                'formateur' => Personnel::where('type_personnel', 'formateur')->count(),
                'administratif' => Personnel::where('type_personnel', 'administratif')->count(),
            ],

            //  recent activity (optional)
            'latest_conges' => Conge::latest()->take(5)->get(),
            'latest_absences' => Absence::latest()->take(5)->get(),
        ]);
    }
}