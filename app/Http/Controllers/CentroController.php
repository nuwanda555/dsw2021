<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;

class CentroController extends Controller
{
    public function index()
    {
		 $centros=Centro::orderBy("Denominacion")->get();
         return view("centros.index",compact("centros"));
    }


    public function create()
    {
        return view("centros.create");
    }

    public function store(Request $request)
    {
        $datos=$request->all();
		Centro::create($datos);
		return redirect("/centros");
    }


    public function show($id)
    {
     	return "Estoy mostrando el centro $id";
    }


    public function edit($id)
    {
		$centro=Centro::find($id);
		return view("centros.create",compact("centro"));
    }

    public function update(Request $request, $id)
    {
		$datos=$request->all();
		Centro::find($id)->update($datos);
		return redirect("/centros");
    }

    public function destroy($id)
    {
		$centro=Centro::find($id);
        if ($centro){   //si centro se encontró
			$centro->delete();
			return "ok";
		}else{
			return "error";
		}
    }
}




















