{include file="header.tpl"}

<form action="editProductoConfirm" method="POST">
    <div class="form-group">
    <input type="hidden" name="input_id_producto_edit" value={$id_producto}>
    <label for="input_nombre">Nombre</label>
    <input class="form-control" name="input_nombre_edit" value='{$nombre}'>
    </div>
    <div class="form-group">
    <label for="exampleFormControlInput1">Descripcion</label>
    <input class="form-control" name="input_descripcion_edit" value='{$descripcion}'>
    </div>
    <div class="form-group">
    <label for="exampleFormControlSelect1">Categoria</label>
    <select class="form-control" name="input_id_categoria_edit">
    {foreach from=$categorias item=item}      
        <option value={$item->id_categoria}>{$item->nombre_categoria}</option>
    {/foreach}
    </select>
    </div>
    <button type="submit" class="btn btn-primary">Agregar</button>
</form>

{include file="footer.tpl"}

        {* {{if $item->id_categoria == $id_categoria}
        <option selected value={$item->id_categoria}>{$item->nombre}</option>
        {else} 
        <option value={$item->id_categoria}>{$item->nombre}</option>
        {/if}} *}
