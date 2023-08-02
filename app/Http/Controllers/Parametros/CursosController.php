<?php

namespace App\Http\Controllers\Parametros;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class CursosController extends Controller
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
        $respuesta = $http -> get('laravel/cursoall');
        $facultad = $http -> get('laravel/facultadall');
        return view('parametros.cursos.index',compact('respuesta'),compact('facultad'));
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
        return view('parametros.cursos.create',compact('facultad'));
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
            'cod_curso' => $request->cod_curso,
            'descripcion' => $request->descripcion,
            'cod_facultad' => $request->cod_facultad,
        ];
        $date = $http -> post('laravel/curso',$body);
        //return view('home');
        return redirect()->route('parametros.cursos.index');
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
        $data = $http -> get('laravel/curso/'.$id);
        $respuesta = $data[0];
        $facultad = $http -> get('laravel/facultadall');
        //var_dump($facultad);
        return view('parametros.cursos.edit',compact('respuesta'),compact('facultad'));
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
            'descripcion' => $request->descripcion,
            'cod_facultad' => $request->cod_facultad
        ];
        $date = $http -> upd('laravel/curso/'.$id,$body);
        //return view('home');
        return redirect()->route('parametros.cursos.index');
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
        $respuesta = $http -> del('laravel/curso/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('parametros.cursos.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'parametros/cursos";</script>';
        }
    }
}
