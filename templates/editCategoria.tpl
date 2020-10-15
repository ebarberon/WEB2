{include file="header.tpl"}

<form action="editCategoriaConfirm" method="POST">
  <div class="form-group">
    <input type="hidden" name="input_id_categoria_edit" value={$id_categoria}>
    <label for="input_nombre">Nombre</label>
    <input class="form-control" name="input_nombre_edit" placeholder="Nombre">
  </div>
  <button type="submit" class="btn btn-primary">Agregar</button>
</form>

{include file="footer.tpl"}