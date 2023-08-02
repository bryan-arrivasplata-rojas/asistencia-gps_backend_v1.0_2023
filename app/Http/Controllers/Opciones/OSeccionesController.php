<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class OSeccionesController extends Controller
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
        $respuesta = $http -> get('laravel/oseccionall');
        $ciclo = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        $curso = $http -> get('laravel/cursoall');
        $url = env('APP_URL_API');
        return view('opciones.osecciones.index',compact('respuesta'),compact('ciclo','facultad','curso','url'));
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
        $url = env('APP_URL_API');
        return view('opciones.osecciones.create',compact('url','ciclo'));
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
            'cod_ocurso' => $request->cod_ocurso,
            'cod_seccion' => $request->cod_seccion
        ];
        $date = $http -> post('laravel/oseccion',$body);
        //return view('home');
        return redirect()->route('opciones.osecciones.index');
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
        $data = $http -> get('laravel/oseccion/'.$id);
        $respuesta = $data[0];
        $seccion = $http -> get('laravel/oseccionseccion/'.$id);
        return view('opciones.osecciones.edit',compact('respuesta'),compact('seccion'));
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
            'cod_seccion' => $request->cod_seccion
        ];
        $date = $http -> upd('laravel/oseccion/'.$id,$body);
        //return view('home');
        return redirect()->route('opciones.osecciones.index');
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
        $respuesta = $http -> del('laravel/oseccion/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.osecciones.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'opciones/osecciones";</script>';
        }
    }
}