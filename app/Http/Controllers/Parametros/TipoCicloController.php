<?php

namespace App\Http\Controllers\Parametros;

use App\Models\Ciclos;
use App\Models\Http;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TipoCicloController extends Controller
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
        $respuesta = $http -> get('laravel/tipocicloall');
        if(is_string($respuesta)==0){
            return view('parametros.tipociclo.index',compact('respuesta'));
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta.'");window.location.href = "'.env('APP_URL').'home";</script>';
        }
        //return view('parametros.tipociclo.index',compact('respuesta'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('parametros.tipociclo.create');
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
            'semanas' => $request->semanas,
        ];
        $date = $http -> post('laravel/tipociclo',$body);
        //return view('home');
        return redirect()->route('parametros.tipociclo.index');
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
        $data = $http -> get('laravel/tipociclo/'.$id);
        $respuesta = $data[0];
        return view('parametros.tipociclo.edit',compact('respuesta'));
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
            'semanas' => $request->semanas,
        ];
        $date = $http -> upd('laravel/tipociclo/'.$id,$body);
        //return view('home');
        return redirect()->route('parametros.tipociclo.index');
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
        $respuesta = $http -> del('laravel/tipociclo/'.$id);
        if(property_exists($respuesta, 'affectedRows')){
            return redirect()->route('parametros.tipociclo.index');
        }else{
            echo '<script language="javascript">alert("Se presento el siguiente problema: '.$respuesta->sqlMessage.'");window.location.href = "'.env('APP_URL').'parametros/tipociclo";</script>';
        }
    }
}
