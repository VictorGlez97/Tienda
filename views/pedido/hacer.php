<?php if (isset($_SESSION['identity'])){ ?>

    <?php //var_dump($_SESSION); ?>

    <h2> Hacer pedido </h2><hr/><br/>

    <a href="<?=base_url?>carrito/index"> Regresar a observar el precio y productos del carrito </a><br/><br/>
    
    <p> Dirección para el envio: </p><br/>
    <form action="<?=base_url?>pedido/add" method="POST">
        <label for="estado"> Estado: </label><br/>
        <input type="text" name="estado" required /><br/>
        
        <label for="ciudad"> Ciudad: </label><br/>
        <input type="text" name="ciudad" required/><br/>
        
        <label for="direccion"> Dirección: </label><br/>
        <input type="text" name="direccion" required/><br/><br/>
        
        <input type="submit" value="Enviar" class="btn-create" />
    </form>
    

<?php } else { ?>

    <h2> Necesitas estar logueado para poder hacer tu pedido </h2>
    <?php header('refresh:2, url='.base_url); ?>

<?php } ?>





