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
    <link rel="stylesheet" href="<?= base_url('assets\css\auth.css')?>">
</head>
<body>
    <!-- <header>
        <div class="header__container">
            <nav class="navbar">
                <a href="<?=base_url()?>">
                    <h1>E-Store</h1>
                </a>
            </nav>
        </div>
    </header> -->
    <main>
        <?php echo form_open('auth/iniciar_sesion'); ?>
            <div class="form__container">
                <h2>Iniciar Sesión</h2>
                <div class="form__inputs">
                    <div class="form__group">
                        <label for="email">Email</label>
                        <div class="form__input__container">
                            <input type="email" name="email" id="email" class="form__input" required>
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="passwd">Contraseña</label>
                        <div class="form__input__container">
                            <input type="password" name="passwd" id="passwd" class="form__input" required>
                            <span id="passwd_visibility" onclick="passwd_visibility()"><i class="fa-solid fa-eye-slash" id="passwd_icon"></i></span>
                        </div>
                    </div>
                </div>
                <button type="submit">Iniciar sesión</button>
            </div>
        <?php echo form_close(); ?>
    </main>

    <script>
        const txt_passwd = document.getElementById('passwd');
        const passwd_visibility = () => {
            const icon = document.getElementById('passwd_icon');
            if(txt_passwd.getAttribute('type') == 'password'){
                txt_passwd.setAttribute('type', 'text');
                icon.className = 'fa-solid fa-eye';
            } else {
                txt_passwd.setAttribute('type', 'password');
                icon.className = 'fa-solid fa-eye-slash';
            }
        }
    </script>
    <script src="https://kit.fontawesome.com/3130379173.js" crossorigin="anonymous"></script>
</body>
</html>