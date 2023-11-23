<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComentarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comentario = Comentario::all();
        $comentariosFk = Comentario::where('userId', Auth::user()->id)->get();

        return view("welcome", ["comentario" => $comentario], ['comentariosFk' => $comentariosFk]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("form");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Crear un nuevo usuario en la base de datos
        $comentario = new Comentario;
        //Variable local ->CampoEnLaBBDD = Variable ->input("nombre del name del formulario")
        $comentario->texto = $request->input('texto');
        $comentario->userId = Auth::user()->id;
        // Guardar el usuario
        $comentario->save();

        // Redireccionar a la página de inicio u otra vista después de guardar
        return redirect('/');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comentario $comentario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comentario $comentario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comentario $comentario)
    {
        //
    }
}
