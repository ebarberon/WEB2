{include file="header.tpl"}

<article
  id="id_producto"
  data-id={$id_producto}
</article>


<ul class="comments-list">

</ul>



<div class="container">
    <ul id="comments-list">

    </ul>
</div>

{if isset($smarty.session.EMAIL_USER)}
<article
  id="usuario"
  data-id={($smarty.session.ID_USER)}
  {if isset($smarty.session.ADMIN)}
    data-admin=1
  {/if}
</article>

<h3>Dejanos tu comentario</h3>
<form id="form-comment" action="insert" method="POST">
  <div class="form-group">
    <label for="input_puntaje">Puntaje</label>
    <select class="form-control" name="input_puntaje" id="input_puntaje">
      <option>1</option>
      <option>2</option>
      <option>3</option>
      <option>4</option>
      <option selected>5</option>
    </select>
  </div>
  <div class="form-group">
    <label for="input_comentario">Comentario</label>
    <textarea class="form-control"name="input_comentario" id="input_comentario" rows="3"></textarea>
  </div>
  <p id="mensaje"></p>
  <button type="submit" class="btn btn-primary">Enviar comentario</button>
</form>
{/if}

<script src="js/comments.js"></script>
{include file="footer.tpl"}