<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\welcome.css')?>">
</head>
<body>
    <header class="header">
        <div class="header__container">
            <nav class="navbar">
                <a href="<?=base_url()?>">
                    <h1>E-Store</h1>
                </a>
            </nav>
            <div class="navbar__buttons">
                <div class="navbar__auth">
                    <a href="<?=base_url('auth/login')?>">Iniciar Sesión</a>
                </div>
                <div class="navbar__auth">
                    <a href="<?=base_url('auth/register')?>">Registrarse</a>
                </div>
            </div>
        </div>
	</header>
    <main>
        <div class="hero">
            <div>
                <h2 class="hero__titulo">Bienvenido a <span>E-Store</span></h2>
                <h3 class="hero__subtitulo">Nuestra primera tienda 100% online</h3>
            </div>
            <p><a href="<?=base_url('auth/login')?>">Inicia sesión</a> o <a href="<?=base_url('auth/register')?>">registrate</a> ahora mismo!</p>
        </div>
    </main>
    <footer>
        
    </footer>
</body>
</html>