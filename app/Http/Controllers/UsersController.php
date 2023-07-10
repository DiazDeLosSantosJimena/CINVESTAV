<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth/register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        if ($request->input('academic_degree') != ''){
            $academic_degree =  $request->input('academic_degree');
        }else{
            $academic_degree = "Mr";
        }
        if ($request->input('password') != ''){
            $password =  $request->input('password');
        }else{
            $password = "123456";
        }
        User::create(array(
            'name' => $request->input('name'),
            'app' => $request->input('app'),
            'apm' => $request->input('apm'),
            'email' => $request->input('email'),
            'password' => $password,
            'phone' => $request->input('phone'),
            'academic_degree' =>  $academic_degree,
            'country' => $request->input('country'),
            'state' => $request->input('state'),
            'municipality' => $request->input('municipality'),
            'assistance' => $request->input('assistance'),
            'rol_id' => $request->input('rol_id'),
        ));

//         $usuario = User::create($request->all());
// dd($request->all());

        return view('usuarios.perfil');



    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
