<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\vista_producto.css')?>">
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
            <?php if($producto): ?>
                <div class="producto">
                    <div class="producto__img-container">
                        <img src="<?= $producto->url_imagen ?>" alt="producto_<?= $producto->producto_id ?>" class="producto__img">
                    </div>
                    <div class="producto__info">
                        <h2 class="producto__nombre"><?=$producto->nombre ?></h2>
                        <div class="producto__valores">
                            <div class="producto__precio">$ <?= number_format($producto->precio, 2, ',', '.') ?></div>
                            <div class="producto__stock">(<?= $producto->stock ?> ud. disponibles)</div>
                        </div>
                        <p class="producto__descripcion"><?= nl2br($producto->descripcion) ?></p>
                    </div>
                </div>
            <?php else: ?>
                <h2>El producto que busca no existe</h2>
            <?php endif; ?>
        </div>
    </main>
    <footer>

    </footer>
    <script src="https://kit.fontawesome.com/3130379173.js" crossorigin="anonymous"></script>
    <script>
        const menu_profile = document.getElementById('menu_profile');
        const btn_profile = document.getElementById('btn_profile');

        // Función para alternar la visibilidad del menú de perfil
        const viewProfile = () => {
            menu_profile.classList.toggle('profile__menu--oculto');
        };

        // Event listener para cerrar el menú de perfil si se hace clic en cualquier parte fuera de él
        document.addEventListener('click', function(event) {
            if (event.target !== menu_profile && event.target !== btn_profile && !btn_profile.contains(event.target)) {
                menu_profile.classList.add('profile__menu--oculto');
            }
        });
    </script>
</body>
</html>