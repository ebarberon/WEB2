{include file="header.tpl"}

<h3>{$msg}</h3>

<form action='userRegistration' method="POST">
  <div class="form-group">
    <label for="email_user">Email address</label>
    <input type="email" class="form-control" id="email_user" name="email_user" aria-describedby="emailHelp">
  </div>
  <div class="form-group">
    <label for="password_user">Password</label>
    <input type="password" class="form-control" id="password_user" name="password_user">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>

{include file="footer.tpl"}