<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Centro;
use App\Http\Requests\CentrosRequest;
use PDF;

class CentroController extends Controller
{
    public function qr($uuid)
    {
        return view('centros.qr', compact('uuid'));
    }

    public function listadoPdf()
    {
        $centros = Centro::orderBy('Denominacion')
            ->limit(100)
            ->get();
        $pdf = PDF::loadView('centros.pdf', compact('centros'));
        return $pdf->download('listado_centros.pdf');
    }

    public function index()
    {
        $centros = Centro::orderBy('Denominacion')->get();
        return view('centros.index', compact('centros'));
    }

    public function create()
    {
        return view('centros.create');
    }

    public function store(CentrosRequest $request)
    {
        $validated = $request->validated();

        $datos = $request->all();
        $datos['uuid'] = uniqid();
        Centro::create($datos);
        return redirect('/centros');
    }

    public function show($id)
    {
        return "Estoy mostrando el centro $id";
    }

    public function edit($id)
    {
        $centro = Centro::find($id);
        return view('centros.create', compact('centro'));
    }

    public function update(CentrosRequest $request, $id)
    {
        $validated = $request->validated();

        $datos = $request->all();
        Centro::find($id)->update($datos);
        return redirect('/centros');
    }

    public function destroy($id)
    {
        $centro = Centro::find($id);
        if ($centro) {
            //si centro se encontrรณ
            $centro->delete();
            return 'ok';
        } else {
            return 'error';
        }
    }
}
