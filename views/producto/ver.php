<?php if (!empty($pro)){ //var_dump($pro); ?>
    <h3> <?= $pro->producto ?> </h3><br/><hr/><br/>
    
    <div class="vista_pro">
        
        <div class="product">
            <?php if (!empty($pro->img) || $pro->img != ''){ ?>
                    <img src="../uploads/images/<?= $pro->img ?>" class="img_vista" />
            <?php } else { ?>
                    <img src="../assets/img/camiseta.png" class="img_vista" />
            <?php } ?>
        </div>
        
        <div class="info">
            
            <p> <?= $pro->descripcion ?> </p><br>
            <h5 style="text-align: center"> Disponibles: <?= $pro->disposicion .' ' ?> piezas </h5>
            <h4 style="text-align: center"> $ &nbsp; <?= $pro->precio ?> </h4><br>
            
            <div style="text-align: center;">
                <a href="#" class="btn-create"> Comprar </a><br><br>
                <a href="<?= base_url ?>carrito/add&id=<?= $pro->id ?>" id="btn-enviar"> Agregar al carrito </a>
            </div>
            
        </div>
        
    </div>
    
<?php } else { ?>
    <h3> No se encontro el producto </h3>
<?php } ?>

    
    
