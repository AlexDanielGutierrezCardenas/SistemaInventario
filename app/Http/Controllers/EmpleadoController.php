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
use App\Models\Empleado;


class EmpleadoController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:empleado-list|empleado-create|empleado-edit|empleado-delete', ['only' => ['index','show']]);
        $this->middleware('permission:empleado-create', ['only' => ['create','store']]);
        $this->middleware('permission:empleado-edit', ['only' => ['edit','update']]);
        $this->middleware('permission:empleado-delete', ['only' => ['destroy']]);
    }
    // Mostrar todos los personaos
    public function index()
    {
        $empleados = Empleado::all();
        $clientes = Cliente::all();
        $personas = Persona::pluck('nombre', 'id_persona'); 
        //$proveedors = \App\Models\Proveedor::all();
        //$personas = \App\Models\Persona::all()->keyBy('id'); // Organiza personas por ID para búsqueda rápida
        return view('empleado.index', compact('empleados','clientes','personas'));
        //return response()->json($proveedors);
    }

    public function create(): View
    {
        $personas = Persona::pluck('nombre', 'id_persona'); 
        $clientes = Cliente::all();
        $proveedors = Proveedor::all();
        $empleados = Empleado::all();
        $users= User::all();
        return view('empleado.create', compact('personas','clientes','proveedors','empleados','users'));
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
            'id_persona' => 'required|integer',
            'puesto' => 'required|string|max:255',
            'salario' => 'required|integer',
            'fecha_contratacion' => 'required|date'
        ]);

        Empleado::create([
            'id_persona' => $request->id_persona,
            'puesto' => $request->puesto,
            'salario' => $request->salario,
            'fecha_contratacion' => $request->fecha_contratacion,
        ]);

        return redirect()->route('empleado.index')->with('success', 'cliente creado correctamente.');
  
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
    public function destroy($id_empleado): RedirectResponse
    {
        // $persona = Persona::find($id_persona);

        // if ($persona) {
        //     // Eliminar el registro
        //     $persona->delete();

        //     return redirect()->route('persona.index')->with('success', 'Post eliminado exitosamente.');
        // } else {
        //     return redirect()->route('persona.index')->with('error', 'Post no encontrado.');
        // }
        $empleado= Empleado::find($id_empleado);
        if (!$empleado) {
            return response()->json(['message' => 'personao no encontrado'], 404);
        }
        $empleado->delete();
        return redirect()->route('cliente.index')->with('success', 'Persona eliminado correctamente.');
        // return response()->json(['message' => 'Persona   eliminado']);
    }
}
