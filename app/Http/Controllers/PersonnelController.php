<?php

namespace App\Http\Controllers;

use App\Models\Personnel; //plus important
use App\Http\Resources\PersonnelResource;
use App\Http\Requests\StorePersonnelRequest;
use App\Http\Requests\UpdatePersonnelRequest;
use Illuminate\Http\Request;

class PersonnelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Personnel::with('etablissement');

        if(request()->nom){
             $query->where('nom','like','%'.request()->nom.'%');
        }

        if(request()->cin){
             $query->where('cin', request()->cin);
        }

        if(request()->id_etab){
             $query->where('id_etab', request()->id_etab);
        }
         
        // secure sorting
        if(request()->sort_by){
            $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return PersonnelResource::collection(
            $query->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePersonnelRequest $request)
    {  
        $personnel = Personnel::create($request->validated());
        
        return new PersonnelResource($personnel);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $p = Personnel::with('etablissement')->findOrFail($id);

        return new PersonnelResource($p);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePersonnelRequest $request, string $id)
    {
        $p = Personnel::findOrFail($id);
        $p->update($request->validated());

        return new PersonnelResource($p);
    }

    /** 
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         Personnel::destroy($id);
         return response()->json(['message'=>'deleted']);
    }
}
