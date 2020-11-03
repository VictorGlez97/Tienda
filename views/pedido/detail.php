<?php if (isset($order_pro) && !empty($order_pro)) { /*var_dump($order_pro);*/ $details = $order_pro->fetch_object(); //var_dump($detalis); ?>

    <h2> Detalles del pedido </h2><hr/><br/>
    
    <?php if (isset($_SESSION['adm']) && $_SESSION['adm']){ ?>
            <h3> Cambiar estado de pedido: </h3>
            <form method="POST" action="<?=base_url?>pedido/changestate&id=<?=$_GET['id']?>">
                <select name="edo_pedido">
                    <option value="CONFIRMADO" <?= $details->estado_pedido == 'CONFIRMADO' ? 'selected' : '' ?> > En espera </option>
                    <option value="PREPARANDO" <?= $details->estado_pedido == 'PREPARANDO' ? 'selected' : '' ?> > Preparando paquete </option>
                    <option value="LISTO PARA ENVIAR" <?= $details->estado_pedido == 'LISTO PARA ENVIAR' ? 'selected' : '' ?> > Listo para enviar </option>
                    <option value="ENVIADO" <?= $details->estado_pedido == 'ENVIADO' ? 'selected' : '' ?> > Enviado </option>
                </select><br/>
                <input type="submit" value="Guardar" class="btn-create"/>
            </form>
    <?php } ?>
    
    <h3> Direccion: </h3>
    <p> Ciudad: <?= $details->ciudad ?> </p>
    <p> Estado: <?= $details->estado ?> </p>
    <p> Dirección: <?= $details->direccion ?> </p><br/>
    
    <h3> Detalles: </h3>
    <p> Estado del pedido: <?= $details->estado_pedido ?></p>
    <p> Costo: $ <?= $details->costo ?> </p><br/>
    
    <table>
        <thead>
            <tr>
                <th> IMG </th>
                <th> PRODUCTO </th>
                <th> PRECIO </th>
                <th> UNIDADES </th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($order_pro as $product) {
                ?>
                <tr>
                    <td>
                        <?php if ($product['img'] != '') { ?>
                            <img src="../uploads/images/<?= $product['img'] ?>" class="img_carrito" />
                        <?php } else { ?>
                            <img src="../assets/img/camiseta.png" class="img_carrito" />
                        <?php } ?>
                    </td>
                    <td> <?= $product['producto'] ?> </td>
                    <td> $ &nbsp; <?= $product['precio'] ?> </td>
                    <td> <?= $product['unidades'] ?> </td>
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>
<?php } ?>
