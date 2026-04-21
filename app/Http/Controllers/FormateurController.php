<?php

namespace App\Http\Controllers;

use App\Models\Formateur; //plus important
use App\Http\Resources\FormateurResource;
use App\Http\Requests\StoreFormateurRequest;
use App\Http\Requests\UpdateFormateurRequest;
use Illuminate\Http\Request;

class FormateurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Formateur::with(['personnel','permanent','vacataire']);

        if(request()->id_personnel){
           $query->where('id_personnel', request()->id_personnel);
        }

        if(request()->sort_by){
           $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return FormateurResource::collection(
            $query->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
     public function store(StoreFormateurRequest $request)
    {
        $f = Formateur::create($request->validated());

        return new FormateurResource($f);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return new FormateurResource(
            Formateur::with(['personnel','permanent','vacataire'])->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFormateurRequest $request, string $id)
    {
        $f = Formateur::findOrFail($id);
        $f->update($request->validated());

        return new FormateurResource($f);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Formateur::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
