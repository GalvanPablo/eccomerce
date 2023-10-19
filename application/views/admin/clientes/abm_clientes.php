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
            <h2>Clientes</h2>
            <div class="cliente__nuevo">
                <a href="<?=base_url('admin/new_client')?>"><i class="fa-solid fa-plus"></i><span> Nuevo cliente</span></a>
            </div>
            <?php if(!is_null($clientes) && is_array($clientes) &&  !empty($clientes)): ?>
                <table class="table">
                    <thead> <!-- Encabezado de la tabla -->
                        <tr>
                            <!-- <th>ID</th> -->
                            <th>Foto</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>DNI</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody> <!-- Cuerpo de la tabla -->
                        <?php foreach ($clientes as $cliente): ?>
                            <tr class="usuario">
                                <!-- <td class="usuario_id"><?= $cliente->usuario_id ?></td> -->
                                <td class="usuario__img">
                                    <div class="usuario__img-container">
                                        <img src="<?= $cliente->url_foto ? $cliente->url_foto : base_url('assets\img\avatar.png') ?>" alt="<?= "usuario_" . $cliente->usuario_id ?>">
                                    </div>
                                </td>
                                <td class="usuario__nombre"><?= $cliente->nombre ?></td>
                                <td class="usuario__apellido"><?= $cliente->apellido ?></td>
                                <td class="usuario__dni"><?= $cliente->dni ?></td>
                                <td class="usuario__mail"><?= $cliente->mail ?></td>
                                <td class="usuario__actions">
                                    <a href="<?=base_url('admin/client/' . $cliente->usuario_id)?>" title="Editar" class="usuario__action"><i class="fa-solid fa-pen"></i></a>
                                    <span onclick="reset_passwd(<?=$cliente->usuario_id?>,'<?=$cliente->nombre?>','<?=$cliente->apellido?>')" class="usuario__action"><i class="fa-solid fa-key"></i></span>
                                    <span onclick="delete_client(<?=$cliente->usuario_id?>,'<?=$cliente->nombre?>','<?=$cliente->apellido?>')" title="Dar de baja" class="usuario__action"><i class="fa-solid fa-trash"></i></span>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <h3>No hay clientes</h3>
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

        const delete_client = (id, nombre, apellido) => {
            const result = window.confirm('¿Estas seguro de querer dar de baja a ' + nombre + ' ' + apellido + '?\nNo habrá marcha atrás!');
            if(result){
                window.location.href = "<?=base_url('admin/delete_client/')?>" + id;
            }
        }

        const reset_passwd = (id, nombre, apellido) => {
            const result = window.confirm('¿Estas seguro de querer reiniciar la contrseña de ' + nombre + ' ' + apellido + '?\nNo habrá marcha atrás!');
            if(result){
                window.location.href = "<?=base_url('admin/reset_passwd_client/')?>" + id;
            }
        }
    </script>
</body>
</html>