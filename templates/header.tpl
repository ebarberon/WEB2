<!DOCTYPE html>
<html lang="en">
<head>
    <base href="{BASE_URL}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pizzeria</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="home">
                <img src="img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="" loading="lazy">
                Pizzeria
            </a>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                <a class="nav-link" href="home">Menú<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="categorias">Productos</a>
                </li>
                {if isset($smarty.session.EMAIL_USER)}

                    {if isset($smarty.session.ADMIN)}
                    <li class="nav-item">
                        <a class="nav-link" href="admin">Administrar</a>
                    </li>
                    {/if}
                    </ul>

                    <span class="navbar-text">
                    <a class="nav-link" href="logout">Logout({$smarty.session.EMAIL_USER})</a>
                    </span>
                {else}
                 </ul>
                <span class="navbar-text">
                <a class="nav-link" href="login">Log in</a>
                <a class="nav-link" href="registration">Sign up</a>
                </span>   
                {/if}
            </div>
        </nav>
    </header>
    <main class="container"> 