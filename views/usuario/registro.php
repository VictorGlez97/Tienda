<?php if (isset($_SESSION['register']) && $_SESSION['register'] == "complete"){ ?>
        <strong style="color: green;"> REGISTRO COMPLETADO </strong>
<?php } elseif(isset($_SESSION['register']) && $_SESSION['register'] == "fail") {?>
        <strong style="color: red;"> ERROR: REGISTRO FALLIDO </strong>
<?php } ?>
<?php Utls::deleteSession('register') ?>

<h2> Registrarse </h2><hr><br/>

<form action="<?=base_url?>usuario/guardar" method="POST"> 

    <label for="nombre" > Nombre: </label><br/>
    <input type="text" name="nombre" required/><br/>
    
    <label for="apellido" > Apellido: </label><br/>
    <input type="text" name="apellido" required/><br/>
    
    <label for="correo" > Correo: </label><br/>
    <input type="email" name="correo" required/><br/>
    
    <label for="pass" > Contraseña: </label><br/>
    <input type="text" name="pass" required/><br/>
    
    <!--<input type="hidden" name="rol" value="2" />-->
    <label for="rol"> Rol: </label><br/>
    <select name="rol">
        <option value="2"> Usuario </option>
        <?php if (isset($_SESSION['adm']) && $_SESSION['adm']){ ?>
                <option value="1"> Administrador </option>
                <option value="3"> Proveedor </option>
        <?php } ?>
    </select><br/>
    
    <button type="submit" id="btn-enviar"> Guardar </button>
    <!--<input type="submit" value="Guardar" id="btn-enviar" />-->
    
</form>

