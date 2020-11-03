<h3> Gestión de Productos </h3><br/><hr/><br/>

<?php if (isset($_SESSION['product']) && $_SESSION['product'] == 'complete'): ?>
        <h3 style="color: green; text-align: center;"> PRODUCTO <?= $_SESSION['p'] ?> GUARDADA CORRECTAMENTE </h3><br/>
<?php elseif (isset($_SESSION['product']) && $_SESSION['product'] == 'failed'): ?>
        <h3 style="color: red; text-align: center;"> ERROR: PRODUCTO <?= $_SESSION['p'] ?> NO FUE GUARDAD@ </h3><br/>
<?php endif; ?>
<?php if (isset($_SESSION['del_product']) && $_SESSION['del_product'] == 'complete'): ?>
        <h3 style="color: #007BFF; text-align: center;"> PRODUCTO ELIMINADO </h3><br/>
<?php elseif (isset($_SESSION['del_product']) && $_SESSION['del_product'] == 'failed'): ?>
        <h3 style="color: red; text-align: center;"> ERROR: PRODUCTO NO FUE ELIMINADO </h3><br/>
<?php endif; ?>
        
<?php 
    Utls::deleteSession('product'); 
    Utls::deleteSession('p');
    Utls::deleteSession('del_product');
?>

<a href="<?= base_url ?>producto/create" class="btn-create"> Agregar Producto </a><br/><br/>

<table>
    <tr>
        <th> ID </th>
        <th> PRODUCTO </th>
        <th> PRECIO </th>
        <th> DISPOSICIÓN </th>
        <th colspan="2"> ACCIONES </th>
    </tr>
<?php
    foreach ($clothes as $product){
?>   
        <tr>
            <td> <?= $product['id'] ?> </td>
            <td> <?= $product['producto'] ?> </td>
            <td> $ <?= $product['precio'] ?> </td>
            <td> <?= $product['disposicion'] ?> </td>
            <td> <a href="<?= base_url ?>producto/edit&id=<?= $product['id'] ?>"> Editar </a> </td>
            <td> <a href="<?= base_url ?>producto/delete&id=<?= $product['id'] ?>"> Eliminar </a> </td>
        </tr>  
<?php      
    }   //var_dump($categories);
?>
</table>



