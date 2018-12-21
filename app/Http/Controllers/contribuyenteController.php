<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\contribuyente;
use Auth;

class contribuyenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $currentuserid = Auth::user()->id;

        $contribuyentes=contribuyente::where('id_usuario', $currentuserid )->paginate(5);

        //$contribuyentes=contribuyente::orderBy('id','ASC')->paginate(3);

        return view('contribuyentes.index')->with(['contribuyentes' => $contribuyentes]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contribuyente.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $this->validate($request,[ 'razonSocial'=>'required',
            'RFC'=>'required',
            'correo_Electronico'=>'required',
            'id_usuario'=>'required',
        ]);
        contribuyente::create($request->all());
        return redirect()->route('contribuyentes.index')->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $contribuyentes=contribuyente::find($id);
        return view('contribuyentes.edit')->with(['contribuyentes' => $contribuyentes]);
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

        $this->validate($request,[ 'razonSocial'=>'required',
            'RFC'=>'required',
            'correo_Electronico'=>'required'
        ]);
 
        contribuyente::find($id)->update($request->all());
        return redirect()->route('contribuyentes.index')->with('success','Registro actualizado satisfactoriamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        contribuyente::find($id)->delete();
        return redirect()->route('contribuyentes.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
