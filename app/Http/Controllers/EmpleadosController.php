<?php

namespace App\Http\Controllers;

use App\empleados;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EmpleadosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Hacemos una consulta del modelo empleados
        $datos['empleados']=Empleados::paginate(4);
        return view('empleados.index', $datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('empleados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
     
        //Creamos una variable y le pasamos lo que traemos por reques

        //$datosEmpleados=request()->all();
        $datosEmpleados=request()->except('_token');

        //Guardar la imagen

        if($request->hasFile('foto')){
            $datosEmpleados['foto']=$request->file('foto')->store('uploads','public');
        }

     
        //Guardamos en la bd los valores que treamoes por request
        Empleados::insert($datosEmpleados);
     

        return redirect('empleados');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function show(empleados $empleados)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Consultamos todo lo que tienen el id y lo pasamos a la vista
        $empleado = Empleados::find($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        //Guardamos todo lo que tenemos en request
        $datosEmpleados = request()->except(['_token', '_method']);

        if($request->hasFile('foto')){
            $empleado = Empleados::find($id);
            Storage::delete('public/'.$empleado->foto);
            $datosEmpleados['foto']=$request->file('foto')->store('uploads', 'public');
        }
        Empleados::where('id', '=', $id)->update($datosEmpleados);
        $empleado= Empleados::find($id);
        return view('empleados.edit', compact('empleado'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\empleados  $empleados
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    
     //Consultamos todo lo que tenga ese usuario
     $empleado= Empleados::find($id);
     if(Storage::delete('public/'. $empleado->foto)){
     //Eliminamos lo que tenemos en id
      Empleados::destroy($id);
     }
     
      return redirect('empleados');
    }
}
