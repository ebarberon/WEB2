{include file="header.tpl"}

<div>
  <h2>Usuarios</h2>
  <ul class='list-group mt-3'>
  {foreach from=$users item=item}
      <li class='list-group-item'>
      {$item->email}
        {if {$item->admin} == 1}
            <button type="button" class="btn btn-warning ml-2"><a href="makeUser/{$item->id_user}">Hacer usuario</a></button>
        {else}
             <button type="button" class="btn btn-warning ml-2"><a href="makeAdmin/{$item->id_user}">Hacer administrador</a></button>
        {/if}
      
      <button type="button" class="btn btn-danger ml-2"><a href="#">Eliminar usuario</a></button>
      </li>
  {/foreach}
  </ul>
</div>

{include file="footer.tpl"}
