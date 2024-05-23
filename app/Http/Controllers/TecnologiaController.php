<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use App\Models\Categoria;
use Illuminate\Http\Request;

class TecnologiaController extends Controller
{
    /**
     * Exibe uma lista de recursos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tecnologias = Tecnologia::all();
        return view('tecnologias.index', compact('tecnologias'));
    }

    /**
     * Exibe o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('tecnologias.create', compact('categorias'));
    }

    /**
     * Armazena um recurso recém-criado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'equired|string|max:255',
            'brand' => 'equired|string|max:255',
            'model' => 'equired|string|max:255',
            'category_id' => 'equired|exists:categories,id',
            'price' => 'equired|numeric',
            'description' => 'equired|string',
            'image' => 'nullable|string',
            'stock' => 'equired|integer',
            'rating' => 'nullable|numeric',
        ]);

        Tecnologia::create($validated);

        return redirect()->route('tecnologias.index')->with('success', 'Tecnologia criada com sucesso!');
    }

    /**
     * Exibe o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        return view('tecnologias.show', compact('tecnologia'));
    }

    /**
     * Exibe o formulário para editar o recurso especificado.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        $categorias = Categoria::all();
        return view('tecnologias.edit', compact('tecnologia', 'categorias'));
    }

    /**
     * Atualiza o recurso especificado no armazenamento.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'equired|string|max:255',
            'brand' => 'equired|string|max:255',
            'odel' => 'equired|string|max:255',
            'category_id' => 'equired|exists:categories,id',
            'price' => 'equired|numeric',
            'description' => 'equired|string',
            'image' => 'nullable|string',
            'tock' => 'equired|integer',
            'rating' => 'nullable|numeric',
        ]);

        $tecnologia = Tecnologia::findOrFail($id);
        $tecnologia->update($validated);

        return redirect()->route('tecnologias.index')->with('success', 'Tecnologia atualizada com sucesso!');
    }

    /**
     * Remove o recurso especificado do armazenamento.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tecnologia = Tecnologia::findOrFail($id);
        $tecnologia->delete();

        return redirect()->route('tecnologias.index')->with('success', 'Tecnologia deletada com sucesso!');
    }
}
