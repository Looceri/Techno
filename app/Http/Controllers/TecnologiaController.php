<?php

namespace App\Http\Controllers;

use App\Models\Tecnologia;
use App\Models\Categoria;
use Illuminate\Auth\Events\Validated;
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
        return view('index', compact('tecnologias'));
    }

    /**
     * Exibe o formulário para criar um novo recurso.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view('create', compact('categorias'));
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
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'stock' => 'required|integer',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            if (file_exists($destinationPath.'/'.$imageName)) {
                // Use the existing image path
                $validated['image'] = 'storage/images/'.$imageName;
            } else {
                // Move the uploaded image to the destination path
                $image->move($destinationPath, $imageName);
                $validated['image'] = 'storage/images/'.$imageName;
            }
        }

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
        return view('show', compact('tecnologia'));
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
        return view('edit', compact('tecnologia', 'categorias'));
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
            'name' => 'required|string|max:255',
            'brand' => 'required|string|max:255',
            'model' => 'required|string|max:255',
            'categoria_id' => 'required|exists:categorias,id',
            'price' => 'required|numeric',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
            'stock' => 'required|integer',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/storage/images');
            if (file_exists($destinationPath.'/'.$imageName)) {
                // Use the existing image path
                $validated['image'] = 'storage/images/'.$imageName;
            } else {
                // Move the uploaded image to the destination path
                $image->move($destinationPath, $imageName);
                $validated['image'] = 'storage/images/'.$imageName;
            }
        }

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
