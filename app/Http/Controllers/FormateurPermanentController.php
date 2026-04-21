<?php

namespace App\Http\Controllers;

use App\Models\FormateurPermanent; //plus important
use App\Http\Resources\FormateurPermanentResource;
use App\Http\Requests\StoreFormateurPermanentRequest;
use App\Http\Requests\UpdateFormateurPermanentRequest;
use Illuminate\Http\Request;

class FormateurPermanentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = FormateurPermanent::with('formateur');

        if(request()->matricule){
            $query->where('matricule', request()->matricule);
        }

        if(request()->grade){
            $query->where('grade','like','%'.request()->grade.'%');
        }

        if(request()->sort_by){
            $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return FormateurPermanentResource::collection(
           $query->paginate($perPage)
        );
    }  

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreFormateurPermanentRequest $request)
    {
        $fp = FormateurPermanent::create($request->validated());

        return new FormateurPermanentResource($fp);
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
    public function update(UpdateFormateurPermanentRequest $request, string $id)
    {
        $fp = FormateurPermanent::findOrFail($id);
        $fp->update($request->validated());

        return new FormateurPermanentResource($fp);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        FormateurPermanent::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
