<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $tecnologia->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="brand">Marca</label>
    <input type="text" id="brand" name="brand" class="form-control" value="{{ old('brand', $tecnologia->brand ?? '') }}"
        required>
</div>
<div class="form-group">
    <label for="model">Modelo</label>
    <input type="text" name="model" id="model" class="form-control" value="{{ old('model', $tecnologia->model ?? '') }}"
        required>
</div>
<div class="form-group">
    <label for="categoria_id">Categoria</label>
    <select name="categoria_id" class="form-control" required>
        @foreach ($categorias as $categoria)
            <option value="{{ $categoria->id }}"
                {{ (old('categoria_id') ?? ($tecnologia->categoria_id ?? '')) == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->nome }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="price">Preço</label>
    <input type="number" step="0.01" name="price" class="form-control"
        value="{{ old('price', $tecnologia->price ?? '') }}" required>
</div>
<div class="form-group">
    <label for="description">Descrição</label>
    <textarea name="description" class="form-control" required>{{ old('description', $tecnologia->description ?? '') }}</textarea>
</div>
<div class="form-group">
    <label for="image">Imagem</label>
    <input type="file" name="image" class="form-control-file" required>
</div>
<div class="form-group">
    <label for="stock">Estoque</label>
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $tecnologia->stock ?? '') }}"
        required>
</div>

