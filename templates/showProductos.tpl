{include file="header.tpl"}


<ul class="list-group mt-5">
        <li class="list-group-item active mt-2"></li>
        {foreach from=$collection item=producto}
            {if $producto->id_categoria == $id_categoria}
                <li class="list-group-item">{$producto->nombre}</li>
            {/if}
        {/foreach}
</ul>

<button type="button" class="btn btn-primary"><a href="categorias">Volver</a></button>


{include file="footer.tpl"}