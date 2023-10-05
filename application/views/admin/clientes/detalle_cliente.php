<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\abm_cliente.css')?>">
</head>
<body>
    <header class="header">
        <div class="header__container">
            <nav class="navbar">
                <a href="<?=base_url('admin')?>">
                    <h1>E-Store</h1>
                </a>
                <ul class="navbar__items">
                    <li class="navbar__item"><a href="<?=base_url('admin\products')?>" class="navbar__link">Productos</a></li>
                    <li class="navbar__item"><a href="<?=base_url('admin\clients')?>" class="navbar__link">Clientes</a></li>
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
                            <!-- <i class="fa-regular fa-user"></i> -->
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
            <?php if($cliente): ?>
                <h2><?=$cliente->apellido . " " . $cliente->nombre ?></h2>
            <?php else: ?>
                <h2>Nuevo cliente</h2>
            <?php endif; ?>
            <?= form_open($cliente ? 'admin/update_client/' . $cliente->usuario_id : 'admin/insert_client') ?>
                <?php if($cliente): ?>
                    <div>
                        <label for="cliente_id">ID</label>
                        <input type="text" name="cliente_id" id="cliente_id" value="<?=$cliente->usuario_id?>" disabled>
                    </div>
                <?php endif; ?>
                <div>
                    <label for="cliente_nombre">Nombre</label>
                    <input type="text" name="cliente_nombre" id="cliente_nombre" value="<?= $cliente ? $cliente->nombre : ''?>">
                </div>
                <div>
                    <label for="cliente_apellido">Apellido</label>
                    <input type="text" name="cliente_apellido" id="cliente_apellido" value="<?= $cliente ? $cliente->apellido : ''?>">
                </div>
                <div>
                    <label for="cliente_email">Email</label>
                    <input type="text" name="cliente_email" id="cliente_email" value="<?= $cliente ? $cliente->mail : ''?>">
                </div>

                <div>
                    <label for="cliente_foto">Foto</label>
                    <input type="text" name="cliente_foto" id="cliente_foto" value="<?= $cliente ? $cliente->url_foto : ''?>">
                </div>

                <button type="submit"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                <button onclick="window.history.back()"><i class="fa-solid fa-xmark"></i> Cancelar</button>
            <?= form_close(); ?>
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