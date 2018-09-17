<?php

namespace App\Http\Controllers\Api\Users;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Requests\Users\UpdateRequest;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection|\Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return UserResource::collection($users);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);

        return UserResource::make($user);
    }

    /**4
     * Update the specified resource in storage.
     *
     * @param UpdateRequest $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $user = (new \App\Models\User)->find($id);
        $user->update($request->validated());

        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Display a listing of users countries with users count
     *
     * @return array
     */
    public function countries()
    {
        $countries = DB::table('users')
            ->select(DB::raw('country as name, count(*) as users_count'))
            ->where('country', '<>', '')
            ->groupBy('country')
            ->orderBy('country')
            ->get();
        
        $result = [];
        foreach ($countries as $country) {
            $result[] = ['name' => $country->name, 'users_count' => $country->users_count];
        }

        return ['data' => $result];
    }
}
