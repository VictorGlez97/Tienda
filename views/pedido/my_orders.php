<h2> Mis pedidos </h2><hr/><br/>

<table>
    <thead>
        <tr>
            <th> No. Pedido </th>
            <th> Fecha </th>
            <th> Costo </th>
        </tr>
    </thead>
    <tbody>
        <?php
        if (isset($orders) && !empty($orders)){
            foreach ($orders as $ord) {
        ?>
        <tr>
            <td> <a href="<?= base_url ?>pedido/details&id=<?= $ord['id'] ?>"> <?= $ord['id'] ?> </a> </td>
            <td> <?= $ord['fecha'] ?> </td>
            <td> $ &nbsp; <?= $ord['costo'] ?> </td>
        </tr>
        <?php
            }
        } else {?>
        <tr>
            <td colspan="3"> Por el momento no tienes pedidos </td>
        </tr>
        <?php } ?>
    </tbody>
</table>