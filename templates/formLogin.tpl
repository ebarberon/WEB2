{include 'header.tpl'}

<div class="mt-5 w-25 mx-auto">    
    <form action='verify' method="POST">
        <div class="form-group" mt->
            <label for="email"> EMAIL</label>
            <input type="email" class="form-control" id="email_input" name="email_input" aria-describedby="emailHelp"
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" class="form-control" id="password_input" name="password_input">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</div>



{include 'footer.tpl'}
