<?php

namespace App\Http\Controllers;

use App\Models\User; //plus important
use App\Http\Resources\UserResource;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $query = User::with('administratif');

         if(request()->name){
               $query->where('name','like','%'.request()->name.'%');
         }

         if(request()->email){
               $query->where('email', request()->email);
         }

        if(request()->role){
              $query->where('role', request()->role);
        }

        if(request()->sort_by){
             $query->orderBy(request()->sort_by, request()->order ?? 'asc');
        }
 
         $perPage = request()->per_page ?? 10;

        return UserResource::collection(
            $query->paginate($perPage)
        );  
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['password'] = bcrypt($data['password']);
        $user = User::create($data);
        
        return new UserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         return new UserResource(
            User::with('administratif')->findOrFail($id)
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        $user = User::findOrFail($id);

        $data = $request->validated();

        if(isset($data['password'])){
            $data['password'] = bcrypt($data['password']);
        }
 
        $user->update($data);

        return new UserResource($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         User::destroy($id);
        return response()->json(['message'=>'deleted']);
    }
}
