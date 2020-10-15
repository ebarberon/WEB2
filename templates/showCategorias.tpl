{include file="header.tpl"}

{foreach from=$collection item=item}
    <div class="jumbotron mt-3">
    <h1 class="display-4">{$item->nombre}</h1>
    <p class="lead">Probá las mejores  {$item->nombre|lower} de la ciudad!! </p>
    <hr class="my-4">
    <a class="btn btn-primary btn-lg" href="categoria/{$item->id_categoria}" role="button">Ver</a>
    </div>
{/foreach}

{include file="footer.tpl"}