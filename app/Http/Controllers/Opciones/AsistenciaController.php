<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class AsistenciaController extends Controller
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
        $respuesta = $http -> get('laravel/asistenciaall');
        $ciclo = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        $curso = $http -> get('laravel/cursoall');
        $seccion = $http -> get('laravel/seccionall');
        $email = $http -> get('laravel/perfilalumno');
        $url = env('APP_URL_API');
        return view('opciones.asistencias.index',compact('respuesta'),compact('ciclo','facultad','curso','seccion','email','url'));
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
        $semana = $http -> get('clases/semanas');
        $url = env('APP_URL_API');
        return view('opciones.asistencias.create',compact('url','ciclo','semana'));
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
            'cod_op_semana' => $request->cod_op_semana,
            'cod_oseccion' => $request->cod_oseccion,
            'cod_aula' => $request->cod_aula,
            'distancia_maxima' => $request->distancia_maxima,
            'tiempo_cerrar_num_solicitud' => $request->tiempo_cerrar_num_solicitud
        ];
        $respuesta = $http -> post('laravel/asistencia',$body);
        if(property_exists($respuesta, 'response')){
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->response.'");window.location.href = "'.env('APP_URL').'opciones/asistencias";</script>';
        }else{
            return redirect()->route('opciones.asistencias.index');
        }
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
        $data = $http -> get('laravel/asistencia/'.$id);
        $respuesta = $data[0];
        return view('opciones.asistencias.edit',compact('respuesta'));
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
            'distancia_maxima' => $request->distancia_maxima,
            'tiempo_cerrar_num_solicitud' => $request->tiempo_cerrar_num_solicitud,
            'habilitado' => $request->habilitado
        ];
        $respuesta = $http -> upd('laravel/asistencia/'.$id,$body);
        //return view('home');
        if(property_exists($respuesta, 'response')){
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->response.'");window.location.href = "'.env('APP_URL').'opciones/asistencias";</script>';
        }else{
            return redirect()->route('opciones.asistencias.index');
        }
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
        $respuesta = $http -> del('laravel/asistencia/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.asistencias.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'opciones/asistencias";</script>';
        }
    }
}
