<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class OSemanasController extends Controller
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
        $respuesta = $http -> get('laravel/osemanaall');
        $ciclo = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        return view('opciones.osemanas.index',compact('respuesta'),compact('ciclo','facultad'));
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
        return view('opciones.osemanas.create',compact('ciclo'));
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
            'cod_op' => $request->cod_op,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final
        ];
        $respuesta = $http -> post('laravel/osemana',$body);
        if(property_exists($respuesta, 'response')){
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->response.'");window.location.href = "'.env('APP_URL').'opciones/osemanas";</script>';
        }else{
            return redirect()->route('opciones.osemanas.index');
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
        $data = $http -> get('laravel/osemana/'.$id);
        $respuesta = $data[0];
        $ciclo = $http -> get('laravel/opall');
        return view('opciones.osemanas.edit',compact('respuesta'),compact('ciclo'));
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
            'num_semana' => $request->num_semana,
            'cod_op' => $request->cod_op,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final
        ];
        $respuesta = $http -> upd('laravel/osemana/'.$id,$body);
        if(property_exists($respuesta, 'response')){
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->response.'");window.location.href = "'.env('APP_URL').'opciones/osemanas";</script>';
        }else{
            return redirect()->route('opciones.osemanas.index');
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
        $respuesta = $http -> del('laravel/osemana/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.osemanas.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'opciones/osemanas";</script>';
        }
    }
}
