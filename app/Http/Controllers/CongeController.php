<?php

namespace App\Http\Controllers;

use App\Models\Conge; //plus important
use App\Http\Resources\CongeResource;
use App\Http\Requests\StoreCongeRequest;
use App\Http\Requests\UpdateCongeRequest;
use Illuminate\Http\Request;

class CongeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Conge::with('administratif');

        if(request()->type_conge){
             $query->where('type_conge', request()->type_conge);
        }

        if(request()->date_debut){
             $query->where('date_debut','>=', request()->date_debut);
        }

        if(request()->sort_by){
             $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return CongeResource::collection(
             $query->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCongeRequest $request)
    {
        $c = Conge::create($request->validated());

        return new CongeResource($c);
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
    public function update(UpdateCongeRequest $request, string $id)
    {
        $c = Conge::findOrFail($id);
        $c->update($request->validated());

        return new CongeResource($c);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Conge::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
