<h3> Carrito de compra </h3><br/><hr/><br/>

<?php 
    if (isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){ 
        $stats = Utls::statsCarrito();
        //var_dump($_SESSION['carrito']);
?>

    <h4> Total de productos: <?= $stats['count'] ?> </h4><br/>

    <table>
        <thead>
            <tr>
                <th> IMG </th>
                <th> PRODUCTO </th>
                <th> PRECIO </th>
                <th> UNIDADES </th>
                <th>  </th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($_SESSION['carrito'] as $index => $element) {
                    $product = $element['product'];
            ?>
            <tr>
                <td>
                <?php if ($product->img != ''){ ?>
                    <img src="../uploads/images/<?= $product->img ?>" class="img_carrito" />
                <?php } else { ?>
                    <img src="../assets/img/camiseta.png" class="img_carrito" />
                <?php } ?>
                </td>
                <td> <a href="<?=base_url?>producto/view&id=<?=$product->id?>"> <?= $product->producto ?> </a> </td>
                <td> <?= $product->precio ?> </td>
                <td>
                    <a href="<?=base_url?>carrito/up&id=<?=$product->id?>"> + </a>
                    <?= $element['unidades'] ?>
                    <a href="<?=base_url?>carrito/down&id=<?=$product->id?>"> - </a>
                </td>
                <td> <a href="<?=base_url?>carrito/delete_one&id=<?=$product->id?>"> Eliminar </a> </td>
            </tr>
            <?php      
                }  
            ?>
        </tbody>
    </table><br/>

    <div style="float: left;">
        <a href="<?=base_url?>carrito/delete_all" class="btn-del btn-vaciar"> Vaciar Carrito </a>
    </div>
    
    <div class="total-carrito">
        <h4> Precio Total: $ <?= $stats['total'] ?> </h4><br/>
        <a href="<?=base_url?>pedido/make" class="btn-create btn-pedido" style="float: right;"> Hacer pedido </a>
    </div>
        
<?php } else { ?>

    <h3> Por el momento no tienes camisas en tu carrito </h3>

<?php } ?>
