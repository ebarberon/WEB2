{include file="header.tpl"}

<div>
  <h2>Productos</h2>
  <ul class='list-group mt-3'>
  {foreach from=$productos item=item}
      <li class='list-group-item'>{$item->nombre}({$item->nombre_categoria})<button type="button" class="btn btn-warning ml-2"><a href="editarProducto/{$item->id_producto}/{$item->nombre}/{$item->descripcion}/{$item->id_categoria}">Editar</a></button><button type="button" class="btn btn-danger ml-2"><a href="borrarProducto/{$item->id_producto}">Borrar</a></button></li>
  {/foreach}
  </ul>
</div>

<div>
  <h2>Categorias</h2>
  <ul class='list-group mt-3'>
  {foreach from=$categorias item=item}
      <li class='list-group-item'>{$item->nombre_categoria}<button type="button" class="btn btn-warning ml-2"><a href="editarCategoria/{$item->id_categoria}/{$item->nombre}">Editar</a></button><button type="button" class="btn btn-danger ml-2"><a href="borrarCategoria/{$item->id_categoria}">Borrar</a></button></li>
  {/foreach}
  </ul>
</div>


<h2>Agregar un producto</h2>

<form action="insertProducto" method="POST">
  <div class="form-group">
    <label for="input_nombre">Nombre</label>
    <input class="form-control" name="input_nombre" placeholder="Nombre">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input class="form-control" name="input_descripcion" placeholder="Descripcion">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect1">Categoria</label>
    <select class="form-control" name="input_id_categoria">
      {foreach from=$categorias item=item}
        <option value={$item->id_categoria}>{$item->nombre_categoria}</option>
      {/foreach}
    </select>
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>

<h2>Agregar una categoria</h2>

<form action="insertCategoria" method="POST">
  <div class="form-group">
    <label for="input_nombre">Nombre</label>
    <input class="form-control" name="input_nombre" placeholder="Nombre">
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>

<a href="users" class="btn btn-primary btn-lg active mt-4" role="button" aria-pressed="true">Ver lista de usuarios</a>

{include file="footer.tpl"}