<?php

namespace App\Http\Controllers\Opciones;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Http;

class OCursosController extends Controller
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
        $respuesta = $http -> get('laravel/ocursoall');
        $ciclo = $http -> get('laravel/opall');
        $facultad = $http -> get('laravel/facultadall');
        return view('opciones.ocursos.index',compact('respuesta'),compact('ciclo','facultad'));
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
        $curso = $http -> get('laravel/cursoall');
        $url = env('APP_URL_API');
        return view('opciones.ocursos.create',compact('ciclo','curso','url'));
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
            'cod_op' => $request->cod_op
        ];
        $date = $http -> post('laravel/ocurso',$body);
        //return view('home');
        return redirect()->route('opciones.ocursos.index');
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
        $data = $http -> get('laravel/ocurso/'.$id);
        $respuesta = $data[0];
        $curso = $http -> get('laravel/ocursodisponibleall/'.$id);
        return view('opciones.ocursos.edit',compact('respuesta'),compact('curso'));
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
            'cod_curso' => $request->cod_curso
        ];
        $date = $http -> upd('laravel/ocurso/'.$id,$body);
        //return view('home');
        return redirect()->route('opciones.ocursos.index');
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
        $respuesta = $http -> del('laravel/ocurso/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('opciones.ocursos.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'opciones/ocursos";</script>';
        }
    }
}
