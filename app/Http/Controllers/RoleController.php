<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use Redirect;
use Validator;
use App\Roles;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.roles.index')->with('rolesList',Roles::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.roles.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles|max:255',
            ]);

        $objrole = new Roles();
        $objrole->slug = strtolower($request->input('name'));
        $objrole->name = $request->input('name');
        $objrole->save();

        return Redirect::route('roles.index')->with('success', 'Role Added Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UserScore  $userScore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
    }
}
