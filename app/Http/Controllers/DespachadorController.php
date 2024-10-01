<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Proveedor;
use App\Http\Controllers\Post;
use App\Models\Persona;
use App\Models\Cliente;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Empleado;
use App\Models\Despachador;

class DespachadorController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:proveedor-list|proveedor-create|proveedor-edit|proveedor-delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:proveedor-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:proveedor-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:proveedor-delete', ['only' => ['destroy']]);
    // }
    // Mostrar todos los personaos
    public function index()
    {
        $despachadores = Despachador::all();
        $personas = Persona::pluck('nombre', 'id_persona'); 
        //$proveedors = \App\Models\Proveedor::all();
        //$personas = \App\Models\Persona::all()->keyBy('id'); // Organiza personas por ID para búsqueda rápida
        return view('despachador.index', compact('despachadores','personas'));
        //return response()->json($proveedors);
    }

    public function create(): View
    {
        $personas = Persona::pluck('nombre', 'id_persona'); 
        return view('despachador.create', compact('personas'));
    }
    public function edit($id_persona)
    {
        $persona = Persona::find($id_persona);
        $proveedors = Proveedor::all();
        return view('persona.edit', compact('persona','proveedors'));
    }

    // Insertar un nuevo personao
    public function store(Request $request): RedirectResponse
    {
        // $persona = Persona::create($request->all());
        // return response()->json($persona);
        $request->validate([
            'id_persona' => 'required|integer',
            'turno'=> 'required|string|max:255',
            'zona_asignada'=> 'required|string|max:255',
            'fecha_contratacion'=> 'required|date',
            'estado_despachador'=> 'required|string|max:255',
            'contacto'=> 'required|string|max:255',
        ]);

        Proveedor::create([
            'id_persona' => $request->id_persona,
            'turno' => $request->turno,
            'zona_asignada' => $request->zona_asignada,
            'fecha_contratacion' => $request->fecha_contratacion,
            'estado_despachador' => $request->estado_despachador,
            'contacto' => $request->contacto,
        ]);

        return redirect()->route('despachador.index')->with('success', 'Proveedor creado correctamente.');
  
    }

    // Mostrar un personao específico
    // public function show($id_persona): View
    // {
    //     $id_persona = (int) $id_persona;
    //     $persona = Persona::where('id_persona', $id_persona)->first();
    //     // $persona = Persona::find($id_persona);
    //     if (!$persona) {
    //         return response()->json(['message' => 'personao no encontrado'], 404);
    //     }
    //     return response()->json($persona);
    // }

    public function show(Proveedor $proveedor)
    {
        // $user = User::find($id_persona);
        return view('proveedor.show',compact('proveedor'));
    }

    // Actualizar un personao
    public function update(Request $request,Persona $persona) //Request $request, Product $product
    {
        // $persona = Persona::find($persona);
        // if (!$persona) {
        //     return response()->json(['message' => 'personao no encontrado'], 404);
        // }
        // $persona->update($request->all());
        // return redirect()->route('persona.index')->with('success', 'Persona eliminado correctamente.');
        // return response()->json($persona);
        request()->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'fecha_nacimiento' =>'required',
            'genero' => 'required',
            'email' => 'required',
            'telefono' => 'required',
            'direccion' => 'required',
            'estado_civil' => 'required',
            'nacionalidad' => 'required',
            'numero_identificacion' => 'required',
            'ocupacion' => 'required',
        ]);
    
        $persona->update($request->all());
    
        return redirect()->route('persona.index')->with('success','Product updated successfully');
    }

    // Eliminar un personao
    public function destroy($id_proveedor): RedirectResponse
    {
        // $persona = Persona::find($id_persona);

        // if ($persona) {
        //     // Eliminar el registro
        //     $persona->delete();

        //     return redirect()->route('persona.index')->with('success', 'Post eliminado exitosamente.');
        // } else {
        //     return redirect()->route('persona.index')->with('error', 'Post no encontrado.');
        // }
        $proveedor = Proveedor::find($id_proveedor);
        if (!$proveedor) {
            return response()->json(['message' => 'personao no encontrado'], 404);
        }
        $proveedor->delete();
        return redirect()->route('proveedor.index')->with('success', 'Persona eliminado correctamente.');
        // return response()->json(['message' => 'Persona   eliminado']);
    }
}
