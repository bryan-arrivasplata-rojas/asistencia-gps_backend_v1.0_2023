<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class PerfilController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $http = new Http();
        $respuesta = $http -> get('laravel/perfilall');
        return view('parametros.perfiles.index',compact('respuesta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $http = new Http();
        $email = $http -> get('laravel/usuariofaltante');
        $tipo = $http -> get('laravel/rolall');
        //var_dump($email);
        if($email==null){
            //var_dump('true');
            return view('parametros.perfiles.create',compact('tipo'));
        }else{
            //var_dump('false');
            return view('parametros.perfiles.create',compact('tipo','email'));;
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $http = new Http();
        $body = [
            'codigo' => $request->codigo,
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'tercer_nombre' => $request->tercer_nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'tipo' => $request->tipo,
            'email' => $request->email
        ];
        $date = $http -> post('laravel/perfil',$body);
        //return view('home');
        return redirect()->route('parametros.perfiles.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $http = new Http();
        $data = $http -> get('laravel/perfil/'.$id);
        $respuesta = $data[0];
        $email = $http -> get('laravel/usuarioall');
        $email_ = $http -> get('laravel/usuariofaltante');
        $tipo = $http -> get('laravel/rolall');
        return view('parametros.perfiles.edit',compact('respuesta'),compact('tipo','email','email_'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $http = new Http();
        $body = [
            'primer_nombre' => $request->primer_nombre,
            'segundo_nombre' => $request->segundo_nombre,
            'tercer_nombre' => $request->tercer_nombre,
            'apellido_paterno' => $request->apellido_paterno,
            'apellido_materno' => $request->apellido_materno,
            'tipo' => $request->tipo,
            'email' => $request->email
        ];
        $date = $http -> upd('laravel/perfil/'.$id,$body);
        //return view('home');
        return redirect()->route('parametros.perfiles.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $http = new Http();
        $respuesta = $http -> del('laravel/perfil/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('parametros.perfiles.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'parametros/perfiles";</script>';
        }
    }
}
