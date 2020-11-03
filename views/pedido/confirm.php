<?php if (isset($_SESSION['order']) && $_SESSION['order'] == 'complete'){ ?>

        <h2> Tu pedido se ha confirmado </h2><hr/><br/>
        
        <p> Tu pedido ha sido guardado con exito, una vez hayas pagado el coste de este sera procesado y enviado </p>
        <br/>
        
        <?php 
            //var_dump($last_order); 
            //var_dump($order_pro);
        ?>
        
        Numero de pedido: <?= $last_order->id ?><br/>
        Costo total: $ <?= ' '.$last_order->costo ?><br/>
        Prendas: <br/><br/>
        
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
                    <?php if ($product['img'] != ''){ ?>
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
        <br/><br/>
        
        <div style="text-align: right;">
            <a href="<?=base_url?>" class="btn-create"> Aceptar </a>
        </div><br/>
        
        
<?php } else { ?>
        
        <h2> ERROR: tu pedido no ha podido completarse </h2><hr/><br/>
        
<?php } ?>


