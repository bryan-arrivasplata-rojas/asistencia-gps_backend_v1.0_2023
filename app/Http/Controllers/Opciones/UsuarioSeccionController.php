<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class UsuarioSeccionController extends Controller
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
        //return view('parametros.facultades.index');
        $http = new Http();
        $respuesta = $http -> get('laravel/usuarioseccionall');
        $ciclo = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        $curso = $http -> get('laravel/cursoall');
        $seccion = $http -> get('laravel/seccionall');
        $url = env('APP_URL');
        return view('opciones.usuariosecciones.index',compact('respuesta'),compact('ciclo','facultad','curso','seccion','url'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $http = new Http();
        $ciclo = $http -> get('laravel/opall');
        $url = env('APP_URL');
        return view('opciones.usuariosecciones.create',compact('ciclo','url'));
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
            'email' => $request->email,
            'cod_oseccion' => $request->cod_oseccion
        ];
        $date = $http -> post('laravel/usuarioseccion',$body);
        //return view('home');
        return redirect()->route('opciones.usuariosecciones.index');
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
        $data = $http -> get('laravel/usuarioseccion/'.$id);
        $respuesta = $data[0];
        $email = $http -> get('laravel/usuarioseccion/email/'.$id);
        return view('opciones.usuariosecciones.edit',compact('respuesta'),compact('email'));
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
            'email' => $request->email
        ];
        $date = $http -> upd('laravel/usuarioseccion/'.$id,$body);
        //return view('home');
        return redirect()->route('opciones.usuariosecciones.index');
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
        $respuesta = $http -> del('laravel/usuarioseccion/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.usuariosecciones.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL_THIS').'opciones/usuariosecciones";</script>';
        }
    }
}
