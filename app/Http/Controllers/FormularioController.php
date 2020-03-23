<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\User;

use Carbon\Carbon;

class FormularioController extends Controller
{

    public function __construct()
    {
        Carbon::setLocale('es');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $forms = User::all();
        $nombreRepetido = User::query()->selectRaw('nombre, COUNT(*) AS repetido')->groupBy('nombre')->orderBy('repetido', 'desc')->limit(1)->first();
        $generoPorcentaje = User::query()->selectRaw('100*sum(case when sexo = 1 then 1 else 0 end)/count(*) masculino, 100*sum(case when sexo = 0 then 1 else 0 end)/count(*) femenino')->first();

        return view("forms.index",["forms" => $forms, 'nombreRepetido' => $nombreRepetido, "generoPorcentaje" => $generoPorcentaje]);
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view("main.home");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $user = new User;

        $user->cedula = $request->cedula;
        $user->nombre = $request->nombre;
        $user->apellido = $request->apellido;
        $user->sexo = $request->sexo;
        $user->fecha_nacimiento = $request->fecha_nacimiento;

        if($user->save()){


            return redirect("/forms");



        }else{
            return view("main.home");
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
