<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
</head>
<body>
    <header class="header">
        <div class="header__container">
            <nav class="navbar">
                <a href="<?=base_url('client')?>">
                    <h1>E-Store</h1>
                </a>
                <ul class="navbar__items">
                    <li class="navbar__item"><a href="<?=base_url('client\products')?>" class="navbar__link">Productos</a></li>
                </ul>
            </nav>
            <div class="profile">
                <div class="profile__avatar" onclick="viewProfile()" id="btn_profile">
                    <img src="<?=$this->session->userdata('url_foto')?>" alt="foto de perfil">
                </div>
                <div class="profile__menu profile__menu--oculto" id="menu_profile">
                    <div class="profile__data">
                        <div class="profile__image">
                            <img src="<?=$this->session->userdata('url_foto')?>" alt="foto de perfil">
                        </div>
                        <div class="profile__info">
                            <span class="profile__name"><?=$this->session->userdata('nombre')?></span>
                            <span class="profile__email"><?=$this->session->userdata('email')?></span>
                        </div>
                    </div>

                    <div class="profile__option">
                        <a href="#" class="profile__btn-option">
                            <i class="fa-solid fa-user-pen"></i>
                            <span>Editar perfil</span>
                        </a>
                    </div>
                    <div class="profile__option">
                        <a href="<?=base_url('auth/logout')?>" class="profile__btn-option">
                            <i class="fa-solid fa-arrow-right-from-bracket"></i>
                            <span>Salir</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</header>
    <main>
        <div class="container">
            <h2>Productos destacados</h2>
            <h3><?=$this->session->userdata('recien_registrado')?></h3>
            <?php foreach ($productos_destacados as $producto_destacado): ?>
                <p><?=$producto_destacado->nombre?></p>
            <?php endforeach; ?>
        </div>

        <div class="popUp" id="popUp_register">
            <div class="popUp__contenido">
                <div class="popUp__title">
                    <h2>¡Gracias por registrarte!</h2>
                    <div onclick="close_PopUp_register()" class="popUp__cerrar">
                        <i class="fa-solid fa-xmark"></i>
                    </div>
                </div>
                <div class="popUp__mensaje">
                    <p>Estamos encantados de darte la bienvenida a nuestra comunidad. Tu registro ha sido exitoso y estamos emocionados de tenerte como parte de nuestra plataforma.</p>
                    <p>¡Esperamos que disfrutes de tu experiencia en nuestro sitio y que encuentres todo lo que estás buscando!</p>
                    <p>¡Bienvenido de nuevo y gracias por unirte a nosotros!"</p>
                </div>
            </div>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://kit.fontawesome.com/3130379173.js" crossorigin="anonymous"></script>
    <script>
        const menu_profile = document.getElementById('menu_profile');
        const btn_profile = document.getElementById('btn_profile');

        const viewProfile = () => {
            menu_profile.classList.toggle('profile__menu--oculto');
        };

        document.addEventListener('click', function(event) {
            if (event.target !== menu_profile && event.target !== btn_profile && !btn_profile.contains(event.target)) {
                menu_profile.classList.add('profile__menu--oculto');
            }

            if (event.target === popUp_register) {
                popUp_register.style.display = 'none';
            }
        });

        const popUp_register = document.getElementById('popUp_register');
        if('<?=$this->session->userdata('recien_registrado')?>' === '1'){
            popUp_register.style.display = 'block';
            <?= $this->session->set_userdata('recien_registrado', false)?>
        }

        const close_PopUp_register = () => {
            popUp_register.style.display = 'none';
        }
    </script>
</body>
</html>