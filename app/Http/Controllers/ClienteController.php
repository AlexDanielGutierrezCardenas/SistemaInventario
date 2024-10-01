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


class ClienteController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:cliente-list|cliente-create|cliente-edit|cliente-delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:cliente-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:cliente-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:cliente-delete', ['only' => ['destroy']]);
    // }
    // Mostrar todos los personaos
    public function index()
    {
        $clientes = Cliente::all();
        
        //$proveedors = \App\Models\Proveedor::all();
        //$personas = \App\Models\Persona::all()->keyBy('id'); // Organiza personas por ID para búsqueda rápida
        return view('clientes.index', compact('clientes'));



        // Verificar si la persona existe
        

        // Retornar la vista con la persona
        
        //return response()->json($proveedors);
    }

    public function create(Request $request)
    {
        $personas = Persona::pluck('nombre', 'id_persona'); 
        $id_proveedor = $request->query('id_proveedor');
        $proveedor = Proveedor::find($id_proveedor);
        $personas = Persona::pluck('nombre', 'id_persona'); 
        if (!$proveedor) {
            return redirect()->back()->withErrors('Persona no encontrada');
        }
        // $proveedors = Proveedor::all();
        // $clientes = Cliente::all();
        // $empleados = Empleado::all();
        // $users= User::all();
        return view('clientes.create', compact('personas','id_proveedor'));
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
            'categoria_cliente' => 'required|string|max:255',
            'fecha_registro' => 'required|date',
        ]);

        Cliente::create([
            'id_persona' => $request->id_persona,
            'categoria_cliente' => $request->categoria_cliente,
            'fecha_registro' => $request->fecha_registro,
        ]);

        return redirect()->route('cliente.index')->with('success', 'cliente creado correctamente.');
  
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
    public function destroy($id_cliente): RedirectResponse
    {
        // $persona = Persona::find($id_persona);

        // if ($persona) {
        //     // Eliminar el registro
        //     $persona->delete();

        //     return redirect()->route('persona.index')->with('success', 'Post eliminado exitosamente.');
        // } else {
        //     return redirect()->route('persona.index')->with('error', 'Post no encontrado.');
        // }
        $cliente = Cliente::find($id_cliente);
        if (!$cliente) {
            return response()->json(['message' => 'personao no encontrado'], 404);
        }
        $cliente->delete();
        return redirect()->route('cliente.index')->with('success', 'Persona eliminado correctamente.');
        // return response()->json(['message' => 'Persona   eliminado']);
    }
}
