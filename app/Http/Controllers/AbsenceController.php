<?php

namespace App\Http\Controllers;
 
use App\Models\Absence; //plus important
use App\Http\Resources\AbsenceResource;
use App\Http\Requests\StoreAbsenceRequest;
use App\Http\Requests\UpdateAbsenceRequest;
use Illuminate\Http\Request;

class AbsenceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Absence::with('personnel');
 
        if(request()->motif){
           $query->where('motif','like','%'.request()->motif.'%');
        }

        if(request()->date_absence){
            $query->where('date_absence', request()->date_absence);
        }

        if(request()->sort_by){
            $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }

        $perPage = request()->per_page ?? 10;

        return AbsenceResource::collection(
             $query->paginate($perPage)
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAbsenceRequest $request)
    {
        $a = Absence::create($request->validated());

        return new AbsenceResource($a);
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
    public function update(UpdateAbsenceRequest $request, string $id)
    {
        $a = Absence::findOrFail($id);
        $a->update($request->validated());

        return new AbsenceResource($a);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Absence::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
