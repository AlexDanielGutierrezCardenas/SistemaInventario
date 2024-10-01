<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Persona;
use App\Models\Proveedor;

class FormularioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       /*/*/
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        
        $id_persona = $request->query('id_persona');

        // Buscar la persona con el ID proporcionado
        $persona = Persona::find($id_persona);

        // Verificar si la persona existe
        if (!$persona) {
            return redirect()->back()->withErrors('Persona no encontrada');
        }

        // Retornar la vista con la persona
        return view('formulario.create', compact('persona','id_persona'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        dd($request->all());
        // Validar la tabla seleccionada y el identificador
        $validated = $request->validate([
            'table' => 'required|in:administrador,Proveedor,solicitante,Despachador',
            // 'id_persona' => 'required|integer',
        ]);

        // $data = [
        //     'id_persona' => $validated['identificador'],
        // ];
        switch ($validated['table']) {
            case 'Proveedor':
                // Validar los datos del proveedor
                $validatedData = $request->validate([
                    'id_persona' => 'required|integer',
                    'nit' => 'required|integer',
                    'direccion' => 'required|string|max:255',
                ]);
                // $data['id_persona'] = $request->input('id_persona');
                // $data['nit'] = $request->input('nit');
                // $data['direccion'] = $request->input('direccion');´
                Proveedor::create($validatedData);
                break;

            case 'despachador':
                // Validar los datos del despachador
                $request->validate([
                    'turno' => 'required|string|max:255',
                    'zona_asignada' => 'required|string|max:255',
                    'fecha_contratacion' => 'required|date',
                    'estado_despachador' => 'required|string|max:255',
                    'contacto' => 'required|string|max:255',
                ]);
                $data['turno'] = $request->input('turno');
                $data['zona_asignada'] = $request->input('zona_asignada');
                $data['fecha_contratacion'] = $request->input('fecha_contratacion');
                $data['estado_despachador'] = $request->input('estado_despachador');
                $data['contacto'] = $request->input('contacto');
                break;

            default:
                // Manejar caso por defecto si es necesario
                break;
        }

        // Insertar solo los campos relevantes
        // DB::table($validated['table'])->insert($data);
        

        return redirect()->back()->with('success', 'Registro creado exitosamente en la tabla ' . $validated['table']);
    }




    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
