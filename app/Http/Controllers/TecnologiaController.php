<?php

namespace App\Http\Controllers;


use App\Models\Tecnologia;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    public function index()
    {
        $tecnologias = Tecnologia::all();
        return view('tecnologias.index', compact('tecnologias'));
    }

    public function create()
    {
        $categorias = Categoria::all();
        return view('tecnologias.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric',
        ]);

        Tecnologia::create($validated);

        return redirect()->route('tecnologias.index')->with('success', 'Tecnologia criada com sucesso!');
    }

    public function show($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        return view('tecnologias.show', compact('tecnologia'));
    }

    public function edit($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        $categorias = Categoria::all();
        return view('tecnologias.edit', compact('tecnologia', 'categorias'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'nullable|string',
            'stock' => 'required|integer',
            'rating' => 'nullable|numeric',
        ]);

        $tecnologia = Tecnologia::findOrFail($id);
        $tecnologia->update($validated);

        return redirect()->route('tecnologias.index')->with('success', 'Tecnologia atualizada com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        //
    }
}
