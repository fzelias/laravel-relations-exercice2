<?php

namespace App\Http\Controllers;

use App\Models\Profil;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view("back.users.all", compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("back.users.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "nickname" => "required|max:255",
            "name" => "required|max:255",
            "age" => "required|integer",
            "email" => "required",
            "phone" => "required",
        ]);

        $user = new User;
        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->save();

        $profil = new Profil;
        $profil->name = $request->name;
        $profil->age = $request->age;
        $profil->phone = $request->phone;
        $profil->user_id = $user->id;
        $profil->save();

        return redirect()->route("users.index")->with("success", "User has been created !");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view("back.users.edit", compact("user"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            "nickname" => "required|max:255",
            "name" => "required|max:255",
            "age" => "required|integer",
            "email" => "required",
            "phone" => "required",
        ]);

        $user->nickname = $request->nickname;
        $user->email = $request->email;
        $user->save();

        $user->profil->name = $request->name;
        $user->profil->age = $request->age;
        $user->profil->phone = $request->phone;
        $user->profil->save();

        return redirect()->route("users.index")->with("success", "User has been updated !");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        return redirect()->route("users.index")->with("success", "User has been deleted !");
    }
}
