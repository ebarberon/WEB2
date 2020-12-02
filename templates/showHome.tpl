{include file="header.tpl"}


<ul class="list-group mt-5">
    {foreach from=$categorias item=categoria}
        <li class="list-group-item list-group-item-primary">{$categoria->nombre}</li>
        {foreach from=$productos item=producto}
            {if $producto->id_categoria == $categoria->id_categoria}
                <div class="accordion" id="accordionExample">
                <div class="card">
                <div class="card-header" id="heading{$producto->id_producto}">
                <h2 class="mb-0">
                <button class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapse{$producto->id_producto}" aria-expanded="true" aria-controls="collapse{$producto->id_producto}">
                {$producto->nombre}
                </button>
                </h2>
                </div>

                <div id="collapse{$producto->id_producto}" class="collapse" aria-labelledby="heading{$producto->id_producto}" data-parent="#accordionExample">
                <div class="card-body">
                ({$categoria->nombre}) | {$producto->descripcion}
                <button type="button" class="btn btn-warning ml-2"><a href="comments/{$producto->id_producto}">Ver comentarios</a></button>
                </div>
                </div>
            </div>
        </div>
            {/if}
        {/foreach}
    {/foreach}
</ul>


{include file="footer.tpl"}