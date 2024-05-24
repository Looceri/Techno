<div class="form-group">
    <label for="name">Nome</label>
    <input type="text" name="name" class="form-control" value="{{ old('name', $tecnologia->name ?? '') }}" required>
</div>
<div class="form-group">
    <label for="brand">Marca</label>
    <input type="text" name="brand" class="form-control" value="{{ old('brand', $tecnologia->brand ?? '') }}" required>
</div>
<div class="form-group">
    <label for="model">Modelo</label>
    <input type="text" name="model" class="form-control" value="{{ old('model', $tecnologia->model ?? '') }}" required>
</div>
<div class="form-group">
    <label for="category_id">Categoria</label>
    <select name="category_id" class="form-control" required>
        @foreach($categorias as $categoria)
            <option value="{{ $categoria->id }}" {{ (old('category_id') ?? $tecnologia->category_id ?? '') == $categoria->id ? 'selected' : '' }}>
                {{ $categoria->name }}
            </option>
        @endforeach
    </select>
</div>
<div class="form-group">
    <label for="price">Preço</label>
    <input type="number" step="0.01" name="price" class="form-control" value="{{ old('price', $tecnologia->price ?? '') }}" required>
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
    <input type="number" name="stock" class="form-control" value="{{ old('stock', $tecnologia->stock ?? '') }}" required>
</div>
<div class="form-group">
    <label for="rating">Nota</label>
    <input type="number" step="0.01" name="rating" class="form-control" value="{{ old('rating', $tecnologia->rating ?? '') }}">
</div>
