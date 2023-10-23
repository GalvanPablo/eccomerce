<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="<?= base_url('assets\css\base.css')?>">
    <link rel="stylesheet" href="<?= base_url('assets\css\detalle_producto.css')?>">
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
            <?= form_open($producto ? 'admin/update_product/' . $producto->producto_id : 'admin/insert_product')?>
                <?php if($producto): ?>
                    <h2 class="titulo"><?=$producto->producto_id . " - " . $producto->nombre ?></h2>
                <?php else: ?>
                    <h2 class="titulo">Nuevo producto</h2>
                <?php endif; ?>
                <div class="form__container">
                    <?php if($producto): ?>
                        <div class="producto__group" hidden>
                            <label for="producto_id">ID</label>
                            <input type="text" name="producto_id" id="producto_id" value="<?=$producto->producto_id?>" disabled>
                        </div>
                    <?php endif; ?>
                    
                    <div class="form__group" id="form-nombre">
                        <label for="producto_nombre">Nombre</label>
                        <input type="text" name="producto_nombre" id="producto_nombre" value="<?= $producto ? $producto->nombre : ''?>" required>
                    </div>

                    <div class="form__group" id="form-precio">
                        <label for="producto_precio">Precio</label>
                        <input type="text" name="producto_precio" id="producto_precio" value="<?= $producto ? $producto->precio : ''?>" required>
                    </div>

                    <div class="form__group" id="form-stock">
                        <label for="producto_stock">Stock</label>
                        <input type="text" name="producto_stock" id="producto_stock" value="<?= $producto ? $producto->stock : ''?>" required>
                    </div>
                    
                    <div class="form__group" id="form-descripcion">
                        <label for="producto_descripcion">Descripcion</label>
                        <textarea name="producto_descripcion" id="producto_descripcion"><?= $producto ? $producto->descripcion : ''?></textarea>
                    </div>
                    
                    <picture onclick="open_PopUp_foto()" id="form-foto">
                        <img src="<?= $producto ? $producto->url_imagen : ''?>" id="producto_img_preview">
                        <i class="fa-regular fa-image"></i>
                    </picture>
                    
                    <div id="form-buttons">
                        <button type="submit" class="form__btn" id="btn_guardar"><i class="fa-solid fa-floppy-disk"></i> Guardar</button>
                        <div onclick="window.history.back()" class="form__btn" id="btn_cancelar"><i class="fa-solid fa-ban"></i> Cancelar</div>
                    </div>
                </div>
                <div class="popUp" id="popUp_foto">
                    <div class="popUp__contenido">
                        <div class="popUp__mensaje">
                            <div class="form__group">
                                <label for="producto_img">Foto</label>
                                <input type="text" name="producto_img" id="producto_img" value="<?= $producto ? $producto->url_imagen : ''?>" onkeyup="previewImg()" placeholder="url">
                            </div>
                        </div>
                        <div class="popUp__actions">
                            <div onclick="close_PopUp_foto(true)" class="popUp__action" id="popUp_save"><i class="fa-solid fa-check"></i>Aceptar</div>
                            <div onclick="close_PopUp_foto(false)" class="popUp__action" id="popUp_cancel"><i class="fa-solid fa-ban"></i>Cancelar</div>
                        </div>
                    </div>
                </div>
            <?= form_close(); ?>
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
        });
        
        document.getElementById('producto_precio').addEventListener('input', function () {
            // Elimina cualquier caracter que no sea un número o un punto decimal
            this.value = this.value.replace(/[^0-9.]/g, '');
            
            // Verifica si hay más de un punto decimal y lo corrige
            const decimalCount = (this.value.match(/\./g) || []).length;
            if (decimalCount > 1) {
                this.value = this.value.replace(/\.+$/, '');
            }
        });

        document.getElementById('producto_stock').addEventListener('input', function () {
            // Elimina cualquier caracter que no sea un número o un punto decimal
            this.value = this.value.replace(/[^0-9]/g, '');
        });

        const txt_url_foto = document.getElementById('producto_img');
        let url_foto;

        const previewImg = document.getElementById('producto_img_preview');

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

        const textarea = document.getElementById('producto_descripcion');
        const maxLines = 12; // Define el número máximo de líneas permitidas

        textarea.addEventListener('input', function () {
            const lines = this.value.split('\n').length;
            if (lines > maxLines) {
                this.value = this.value.split('\n').slice(0, maxLines).join('\n');
            }
        });

    </script>
</body>
</html>