<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Controllers\Post;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;


class PersonaController extends Controller
{
    // function __construct()
    // {
    //     $this->middleware('permission:persona-list|persona-create|persona-edit|persona-delete', ['only' => ['index','show']]);
    //     $this->middleware('permission:persona-create', ['only' => ['create','store']]);
    //     $this->middleware('permission:persona-edit', ['only' => ['edit','update']]);
    //     $this->middleware('permission:persona-delete', ['only' => ['destroy']]);
    // }
    // Mostrar todos los personaos
    public function index(): View
    {
        $personas = Persona::all();
        return view('persona.index', compact('personas'));
        //return response()->json($personas);
    }

    public function create(): View
    {
        return view('persona.create');
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
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'fecha_nacimiento' => 'required|date',
            'genero' => 'required|string|max:255',
            'email' => 'required|email',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'estado_civil' => 'required|string|max:255',
            'nacionalidad' => 'required|string|max:255',
            'numero_identificacion' => 'required|string|max:255',
        ]);

        $persona = Persona::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'fecha_nacimiento' => $request->fecha_nacimiento,
            'genero' => $request->genero,
            'email' => $request->email,
            'telefono' => $request->telefono,
            'direccion' => $request->direccion,
            'estado_civil' => $request->estado_civil,
            'nacionalidad' => $request->nacionalidad,
            'numero_identificacion' => $request->numero_identificacion,
            'ocupacion' => $request->ocupacion,
        ]);
        // $persona = Persona::create($request->all());
        // $persona = Persona::find($id_persona);
        // $personas = Persona::all();´
        $id_persona = $persona->id_persona;
        //return redirect()->route('persona.index')->with('success', 'Persona creado correctamente.');
        return redirect()->route('formulario.create', ['id_persona' => $persona->id_persona]);

  
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

    public function show(Persona $persona, User $user)
    {
        // $user = User::find($id_persona);
        return view('persona.show',compact('persona','user'));
        return response()->json($personas);
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
    
        return redirect()->route('persona.index', ['persona_id' => $persona->id])->with('success','Product updated successfully');
    }

    // Eliminar un personao
    public function destroy($id_persona): RedirectResponse
    {
        // $persona = Persona::find($id_persona);

        // if ($persona) {
        //     // Eliminar el registro
        //     $persona->delete();

        //     return redirect()->route('persona.index')->with('success', 'Post eliminado exitosamente.');
        // } else {
        //     return redirect()->route('persona.index')->with('error', 'Post no encontrado.');
        // }
        $persona = Persona::find($id_persona);
        if (!$persona) {
            return response()->json(['message' => 'personao no encontrado'], 404);
        }
        $persona->delete();
        return redirect()->route('persona.index')->with('success', 'Persona eliminado correctamente.');
        // return response()->json(['message' => 'Persona   eliminado']);
    }
}
