<?php

namespace App\Http\Controllers;

use App\Models\FormateurVacataire; //plus important
use App\Http\Resources\FormateurVacataireResource;
use App\Http\Requests\StoreFormateurVacataireRequest;
use App\Http\Requests\UpdateFormateurVacataireRequest;
use Illuminate\Http\Request;

class FormateurVacataireController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = FormateurVacataire::with('formateur');

        if(request()->specialite_enseignee){
            $query->where('specialite_enseignee','like','%'.request()->specialite_enseignee.'%');
        }

        if(request()->sort_by){
            $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return FormateurVacataireResource::collection(
            $query->paginate($perPage)
        ); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurVacataireRequest $request)
    {
         $fv = FormateurVacataire::create($request->validated());

        return new FormateurVacataireResource($fv);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormateurVacataireRequest $request, string $id)
    {
        $fv = FormateurVacataire::findOrFail($id);
        $fv->update($request->validated());

        return new FormateurVacataireResource($fv);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FormateurVacataire::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
