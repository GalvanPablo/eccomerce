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
                <!-- <ul class="navbar__items">
                    <li class="navbar__item"><a href="#" class="navbar__link">Inicio</a></li>
                    <li class="navbar__item"><a href="#" class="navbar__link">Productos</a></li>
                </ul> -->
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
        
    </main>
    <footer>
        
    </footer>
</body>
</html>