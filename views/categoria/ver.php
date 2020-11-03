<?php if(isset($category)){ ?>
    <h3> <?= $category->categoria ?> </h3><br/><hr/><br/>
    
    <?php 
        if (!empty($pro)){
            foreach ($pro as $product) {      
    ?>
    <div class="product">
        <a href="<?= base_url ?>producto/view&id=<?= $product['id'] ?>">
            <?php if (!empty($product['img']) || $product['img'] != ''){ ?>
            <img src="../uploads/images/<?= $product['img'] ?>" />
            <?php } else { ?>
            <img src="../assets/img/camiseta.png" />
            <?php } ?>
            <h2> <?= $product['producto'] ?> </h2>
        </a>
        <p> <?= $product['precio'] ?> </p>
        <a href="<?= $product['id'] ?>"> Comprar </a>
    </div>
    <?php
            }
        }
    
    ?>
        
        
<?php } else { ?>
        <h3>La categoría no existe</h3>
<?php } ?>



