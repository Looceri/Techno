<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return view('list_categoria', compact('categorias'));
    }

    public function create()
    {
        return view('create_categoria');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        Categoria::create($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria criada com sucesso.');
    }

    public function show(Categoria $categoria)
    {
        return view('show_categoria', compact('categoria'));
    }

    public function edit(Categoria $categoria)
    {
        return view('edit_categoria', compact('categoria'));
    }

    public function update(Request $request, Categoria $categoria)
    {
        $data = $request->validate([
            'nome' => 'required|string|max:255',
        ]);

        $categoria->update($data);

        return redirect()->route('categorias.index')->with('success', 'Categoria atualizada com sucesso.');
    }

    public function destroy(Categoria $categoria)
    {
        $categoria->delete();

        return redirect()->route('categorias.index')->with('success', 'Categoria excluída com sucesso.');
    }
}
