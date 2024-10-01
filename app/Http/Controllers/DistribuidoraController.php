<?php

namespace App\Http\Controllers;
use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use App\Models\Persona;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use App\Models\Proveedor;
use App\Models\Distribuidora;

class DistribuidoraController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:distribuidora-list|distribuidora-create|distribuidora-edit|distribuidora-delete', ['only' => ['index','show']]);
        $this->middleware('permission:distribuidora-create', ['only' => ['create','store']]);
        $this->middleware('permission:distribuidora-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:distribuidora-delete', ['only' => ['destroy']]);
    }
    // Mostrar todos los personaos
    public function index()
    {
        $distribuidoras = Distribuidora::all();
        //$proveedors = \App\Models\Proveedor::all();
        //$personas = \App\Models\Persona::all()->keyBy('id'); // Organiza personas por ID para búsqueda rápida
        return view('distribuidora.index', compact('distribuidoras'));
        //return response()->json($proveedors);
    }

    public function create(): View
    {
        $distribuidoras = Distribuidora::all();
        $personas = Persona::pluck('nombre', 'id_persona'); 
        $proveedors = Proveedor::all();
        return view('distribuidora.create', compact('distribuidoras','personas','proveedors'));
    }
    public function edit($id_persona)
    {
        $persona = Persona::find($id_persona);
        
        return view('persona.edit', compact('persona'));
    }

    // Insertar un nuevo personao
    public function store(Request $request): RedirectResponse
    {
        // $persona = Persona::create($request->all());
        // return response()->json($persona);
        $request->validate([
            'id_proveedor' => 'required|integer',
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:255',
            'email' => 'required|email'
        ]);

        Distribuidora::create([
            'id_proveedor' => $request->id_proveedor,
            'nombre' => $request->nombre,
            'direccion' => $request->direccion,
            'telefono' => $request->telefono,
            'email' => $request->email,
        ]);

        return redirect()->route('distribuidora.index')->with('success', 'distribuidora creado correctamente.');
  
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

    public function destroy($id_distribuidora): RedirectResponse
    {
        $distribuidora= Distribuidora::find($id_distribuidora);
        if (!$distribuidora) {
            return response()->json(['message' => 'personao no encontrado'], 404);
        }
        $distribuidora->delete();
        return redirect()->route('distribuidora.index')->with('success', 'Persona eliminado correctamente.');
    }
}
