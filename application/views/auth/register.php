<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrarse</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\auth.css')?>">
</head>
<body>
    <main>
        <?php echo form_open('auth/registrarse'); ?>
            <div class="form__container">
                <div class="form__title">
                    <a href="<?=base_url()?>"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                    <h2>Crear cuenta</h2>
                </div>
                <div class="form__inputs">
                    <div class="form__img_container">
                        <picture onclick="open_PopUp_foto()" id="form-foto">
                            <img src="<?=base_url('assets\img\avatar.png')?>" id="cliente_img_preview">
                        </picture>
                    </div>
                    <div class="form__group">
                        <label for="dni">DNI</label>
                        <div class="form__input__container">
                            <input type="text" name="dni" id="dni" class="form__input" onchange="validate_dni()" required maxlength="10">
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="nombre">Nombre</label>
                        <div class="form__input__container">
                            <input type="text" name="nombre" id="nombre" class="form__input" onchange="validate_nombre()" required maxlength="45">
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="apellido">Apellido</label>
                        <div class="form__input__container">
                            <input type="text" name="apellido" id="apellido" class="form__input" onchange="validate_apellido()" required maxlength="45">
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="email">Email</label>
                        <div class="form__input__container">
                            <input type="email" name="email" id="email" class="form__input" onchange="validate_email()" required>
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="passwd">Contraseña</label>
                        <div class="form__input__container">
                            <input type="password" name="passwd" id="passwd" class="form__input" onchange="validate_passwd()" required autocomplete="false">
                            <span id="passwd_visibility" onclick="passwd_visibility()"><i class="fa-solid fa-eye-slash" id="passwd_icon"></i></span>
                        </div>
                    </div>
                    <div class="form__group">
                        <label for="passwd2">Confirmar contraseña</label>
                        <div class="form__input__container">
                            <input type="password" name="passwd2" id="passwd2" class="form__input" onchange="validate_passwd()" required autocomplete="false">
                            <span id="passwd2_visibility" onclick="passwd2_visibility()"><i class="fa-solid fa-eye-slash" id="passwd2_icon"></i></span>
                        </div>
                    </div>
                </div>
                <button type="submit" id="btn_submit" disabled>Registrarse</button>
                <div class="form__redirect-auth">
                    ¿Ya posee una cuenta? <a href="<?=base_url('auth/login')?>">Inicie sesión</a>
                </div>
            </div>

            <div class="popUp" id="popUp_foto">
                <div class="popUp__contenido">
                    <div class="popUp__mensaje">
                        <div class="form__group">
                            <label for="cliente_foto">Foto</label>
                            <input type="text" name="cliente_foto" id="cliente_foto" value="<?=base_url('assets\img\avatar.png')?>" onkeyup="previewImg()" placeholder="url">
                        </div>
                    </div>
                    <div class="popUp__actions">
                        <div onclick="close_PopUp_foto(true)" class="popUp__action" id="popUp_save"><i class="fa-solid fa-check"></i>Aceptar</div>
                        <div onclick="close_PopUp_foto(false)" class="popUp__action" id="popUp_cancel"><i class="fa-solid fa-ban"></i>Cancelar</div>
                    </div>
                </div>
            </div>

        <?php echo form_close(); ?>
    </main>

    <script>
        const passwd_visibility = () => {
            const icon = document.getElementById('passwd_icon');
            const txt_passwd = document.getElementById('passwd');
            if(txt_passwd.getAttribute('type') == 'password'){
                txt_passwd.setAttribute('type', 'text');
                icon.className = 'fa-solid fa-eye';
            } else {
                txt_passwd.setAttribute('type', 'password');
                icon.className = 'fa-solid fa-eye-slash';
            }
        }

        const passwd2_visibility = () => {
            const icon = document.getElementById('passwd2_icon');
            const txt_passwd = document.getElementById('passwd2');
            if(txt_passwd.getAttribute('type') == 'password'){
                txt_passwd.setAttribute('type', 'text');
                icon.className = 'fa-solid fa-eye';
            } else {
                txt_passwd.setAttribute('type', 'password');
                icon.className = 'fa-solid fa-eye-slash';
            }
        }

        // POPUP para la FOTO
        const txt_url_foto = document.getElementById('cliente_foto');
        let url_foto;

        const previewImg = document.getElementById('cliente_img_preview');

        const popUp_foto = document.getElementById('popUp_foto');
        const open_PopUp_foto = () => {
            url_foto = txt_url_foto.value;
            popUp_foto.style.display = 'block';
        }
        const close_PopUp_foto = (guardar) => {
            if(guardar){
                url_foto = txt_url_foto.value;
                previewImg.src = url_foto;
            } else {
                txt_url_foto.value = url_foto;
            }
            popUp_foto.style.display = 'none';
        }


        // ########## VALIDACIONES ##########

        // DNI
        let dni_isValid = false;
        const validate_dni = () => {
            dni_isValid = document.getElementById('dni').value.trim().length > 0;
            changeColor("dni", dni_isValid ? "black" : "red");
            check_validation();
        }

        // Nombre
        let nombre_isValid = false;
        const validate_nombre = () => {
            console.log("validando");
            nombre_isValid = document.getElementById('nombre').value.trim().length > 0;
            changeColor("nombre", nombre_isValid ? "black" : "red");
            check_validation();
        }

        // Apellido
        let apellido_isValid = false;
        const validate_apellido = () => {
            apellido_isValid = document.getElementById('apellido').value.trim().length > 0;
            changeColor("apellido", apellido_isValid ? "black" : "red");
            check_validation();
        }
        
        // Email
        let email_isValid = false;
        const validate_email = () => {
            const regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
            email_isValid = regex.test(document.getElementById('email').value)
            changeColor("email", email_isValid ? "black" : "red");
            check_validation();
        }

        // Contraseña
        let passwd_isValid = false
        const validate_passwd = () => {
            const txt_passwd = document.getElementById('passwd');
            const txt_passwd2 = document.getElementById('passwd2');
            passwd_isValid = txt_passwd.value.trim().length > 0 && txt_passwd.value === txt_passwd2.value;
            changeColor("passwd", passwd_isValid ? "black" : "red");
            changeColor("passwd2", passwd_isValid ? "black" : "red");
            check_validation();
        }


        const check_validation = () => {
            const valid = (dni_isValid & nombre_isValid & apellido_isValid & email_isValid & passwd_isValid)

            console.clear();
            console.log("dni: " + dni_isValid);
            console.log("nombre: " + nombre_isValid);
            console.log("apellido: " + apellido_isValid);
            console.log("email: " + email_isValid);
            console.log("passwd: " + passwd_isValid);

            console.log("Valido para registrar: " + ( valid ? "si" : "no" ));
            document.getElementById('btn_submit').disabled = !valid;
        }


        // Alertar de error
        const changeColor = (id, color) => {
            document.querySelector('.form__input__container:has(#'+ id + ')').style.borderColor = color;
            document.querySelector('label[for="' + id + '"]').style.color = color;
        }
    </script>
    <script src="https://kit.fontawesome.com/3130379173.js" crossorigin="anonymous"></script>
</body>
</html>