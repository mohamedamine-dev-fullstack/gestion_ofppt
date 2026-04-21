<?php

namespace App\Http\Controllers;

use App\Models\Administratif; //plus important
use App\Http\Resources\AdministratifResource;  
use App\Http\Requests\StoreAdministratifRequest;
use App\Http\Requests\UpdateAdministratifRequest;
use Illuminate\Http\Request;

class AdministratifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $query = Administratif::with(['personnel','conges']);

         if(request()->matricule){
            $query->where('matricule', request()->matricule);
         }

         if(request()->fonction){
            $query->where('fonction','like','%'.request()->fonction.'%');
         }

         if(request()->sort_by){
            $query->orderBy(request()->sort_by, request()->order ?? 'asc');
         } 

         $perPage = request()->per_page ?? 10;

         return AdministratifResource::collection(
              $query->paginate($perPage)
         );
    }
        
    public function store(StoreAdministratifRequest $request)
    {
        $a = Administratif::create($request->validated());

        return new AdministratifResource($a);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    { 
        return new AdministratifResource(
            Administratif::with(['personnel','conges'])->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAdministratifRequest $request, $id)
    {
        $a = Administratif::findOrFail($id);
        $a->update($request->validated());

        return new AdministratifResource($a);
    }

 
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Administratif::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
