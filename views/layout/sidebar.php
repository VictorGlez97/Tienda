<aside>
    
    <div id="mi_carrito" class="block_aside">
        <div id="title-login"> Mi Carrito </div><br/>
        <div style="text-align: left; margin-left: 15%;">
            <?php $stats = Utls::statsCarrito(); ?>
            <a href=""> Productos(<?= $stats['count'] ?>) </a><br/>
            <a href=""> Total:  $ <?= ' '. floatval($stats['total']) ?> </a><br/>
            <a href="<?= base_url.'carrito/index' ?>"> Ver carrito </a>
        </div>
    </div><br/>
    
    <div id="login" class="block_aside">

        <?php if (!isset($_SESSION['identity'])){ ?>
        <div id="title-login"><a href="<?= base_url ?>usuario/registro"> Entra a la WEB </a></div>

        <form action="<?=base_url?>usuario/login" method="POST">
            <label for="email"> Usuario: </label><br/>
            <input type="email" name="email" /><br/>

            <label for="password"> Contraseña: </label><br/>
            <input type="password" name="pass" /><br/>

            <input type="submit" value="Entrar" id="btn-enviar" /><br/><br/>
        </form>
            <?php if (isset($_SESSION['fail_login'])) {?>
                    <h4 style="color: red;"> <?= $_SESSION['fail_login'] ?> </h4>
            <?php } //var_dump($_SESSION);?>
            <?php Utls::deleteSession('fail_login'); ?>
        
        <?php } elseif (isset($_SESSION['identity'])) {?>
        <br/>
        <div id="title-login"><a href="#"><?= $_SESSION['identity']->nombre .' '. $_SESSION['identity']->apellido ?> </a></div>
        <br/>
        <section>
            <?php if (!isset($_SESSION['adm'])){ ?>
            <span></span><a href="<?= base_url ?>pedido/my_orders"> Mis pedidos </a><br/>
            <?php } ?>
            
            <?php if (isset($_SESSION['adm']) && $_SESSION['adm']){ ?>
            <span></span><a href="<?= base_url ?>categoria/index"> Gestionar categorias </a><br/>
            <span></span><a href="<?= base_url ?>producto/management"> Gestionar productos </a><br/>
            <span></span><a href="<?= base_url ?>pedido/management"> Gestionar pedidos </a><br/><br/>
            <span></span><a href="<?= base_url ?>usuario/registro"> Registrar Usuarios </a><br/>
            <?php } ?>
            
            <br/><span></span><a href="<?= base_url ?>usuario/logout"> Cerrar sesión </a><br/>
        </section>
        
        <?php } ?>
        
    </div>
</aside>

<div id="central">
