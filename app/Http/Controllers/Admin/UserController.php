<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $styles = array(
            'vendor/sweetalert2/sweetalert2.min.css',
        );
        $scripts = array(
            'vendor/sweetalert2/sweetalert2.min.js',
            'assets/js/app_main.js',
            'assets/js/app_crud.js',
        );
        return view('app.user.form',[
            'title'     => 'MEU CADASTRO',
            'scripts'   => $scripts,
            'styles'    => $styles,
            'data'      => User::where('id',Auth::user()->id)->first()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->username = Str::slug($request->username, '_');
        $request->validate([
            'cpf'       => ['required',
                Rule::unique('users', 'cpf')->ignore(Auth::user()->id)],
            'username'       => ['required',
                Rule::unique('users', 'username')->ignore(Auth::user()->id)],
            'name'      => 'required',
            'phone'     => 'required',
            'email'     => ['required',
                Rule::unique('users', 'email')->ignore(Auth::user()->id)]
        ]);

        $user               = User::where('id',Auth::user()->id)->first();
        $user->name         = mb_strtoupper($request->name);
        $user->username     = $request->username;
        $user->cpf          = $request->cpf;
        $user->phone        = $request->phone;
        $user->bio          = $request->bio;
        $user->updated_by   = Auth::user()->name;

        if(filter_var($request->email, FILTER_VALIDATE_EMAIL)){
            $user->email = strtolower($request->email);
        }
        if($user->save()){
            return response()->json(
                [
                    'success' => true,
                    'location'=> '',
                    'message' => 'Atualizado com sucesso'
                ]
            );
        }else{
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Erro ao tentar atualizar'
                ]
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
