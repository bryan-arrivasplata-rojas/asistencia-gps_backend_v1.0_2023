<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class AulaController extends Controller
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
        $respuesta = $http -> get('laravel/aulaall');
        $facultad = $http -> get('laravel/facultadall');
        return view('parametros.aulas.index',compact('respuesta'),compact('facultad'));
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
        return view('parametros.aulas.create',compact('facultad'));
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
            'cod_aula' => $request->cod_aula,
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'referencia' => $request->referencia,
            'cod_facultad' => $request->cod_facultad,
        ];
        $date = $http -> post('laravel/aula',$body);
        //return view('home');
        return redirect()->route('parametros.aulas.index');
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
        $data = $http -> get('laravel/aula/'.$id);
        $respuesta = $data[0];
        $facultad = $http -> get('laravel/facultadall');
        return view('parametros.aulas.edit',compact('respuesta'),compact('facultad'));
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
            'latitud' => $request->latitud,
            'longitud' => $request->longitud,
            'referencia' => $request->referencia,
            'cod_facultad' => $request->cod_facultad,
        ];
        $date = $http -> upd('laravel/aula/'.$id,$body);
        //return view('home');
        return redirect()->route('parametros.aulas.index');
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
        $respuesta = $http -> del('laravel/aula/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('parametros.aulas.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL_THIS').'parametros/aulas";</script>';
        }
    }
}
