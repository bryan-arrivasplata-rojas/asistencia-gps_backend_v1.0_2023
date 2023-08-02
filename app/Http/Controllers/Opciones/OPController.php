<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class OPController extends Controller
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
        $respuesta = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        return view('opciones.ops.index',compact('respuesta'),compact('facultad'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $http = new Http();
        $facultad = $http -> get('laravel/facultadall');
        $semana = $http -> get('laravel/tipocicloall');
        return view('opciones.ops.create',compact('facultad','semana'));
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
            'cod_facultad' => $request->cod_facultad,
            'cod_tipo_ciclo' => $request->cod_tipo_ciclo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final
        ];
        $date = $http -> post('laravel/op',$body);
        //return view('home');
        return redirect()->route('opciones.ops.index');
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
        $data = $http -> get('laravel/op/'.$id);
        $respuesta = $data[0];
        $semana = $http -> get('laravel/tipocicloall');
        return view('opciones.ops.edit',compact('respuesta'),compact('semana'));
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
            'cod_tipo_ciclo' => $request->cod_tipo_ciclo,
            'descripcion' => $request->descripcion,
            'fecha_inicio' => $request->fecha_inicio,
            'fecha_final' => $request->fecha_final
        ];
        $date = $http -> upd('laravel/op/'.$id,$body);
        //return view('home');
        return redirect()->route('opciones.ops.index');
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
        $respuesta = $http -> del('laravel/op/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.ops.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'opciones/ops";</script>';
        }
    }
}
