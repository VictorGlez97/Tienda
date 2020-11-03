<h3> MAS VENDIDO </h3><br/><hr/>
<div id="mas_vendido">
    
    <?php 
    //var_dump($sell_products);
    
        if (!empty($sell_products)){
            
            //while ($s_p = $sell_products->fetch_object()) {
            foreach ($sell_products as $s_p) {
    ?>
    <div class="product">
        <a href="<?= base_url ?>producto/view&id=<?= $s_p['id'] ?>">
        <?php if (!empty($s_p['img']) || $s_p['img'] != ''){ ?>
        <img src="uploads/images/<?= $s_p['img'] ?>" />
        <?php } else { ?>
        <img src="assets/img/camiseta.png" />
        <?php } ?>
        <h2> <?= $s_p['producto'] ?> </h2>
        </a>
        <p> <?= $s_p['precio'] ?> </p>
        <a href="<?= $s_p['id'] ?>"> Comprar </a>
    </div>
    <?php
            }
        }
    
    ?>

</div>

<h3> ULTIMOS PRODUCTOS </h3><br/><hr/>
<div id="ultimo">
    
    <?php 
        if (!empty($new_products)){
            foreach ($new_products as $n_p) {      
    ?>
    <div class="product">
        <a href="<?= base_url ?>producto/view&id=<?= $n_p['id'] ?>">
        <?php if (!empty($n_p['img']) || $n_p['img'] != ''){ ?>
        <img src="uploads/images/<?= $n_p['img'] ?>" />
        <?php } else { ?>
        <img src="assets/img/camiseta.png" />
        <?php } ?>
        <h2> <?= $n_p['producto'] ?> </h2>
        </a>
        <p> <?= $n_p['precio'] ?> </p>
        <a href="<?= $n_p['id'] ?>"> Comprar </a>
    </div>
    <?php
            }
        }
    
    ?>    

</div>

<h3> TEMPORADA <?php echo date('Y'); ?> </h3><br/><hr/>
<div id="temporada">
    
    <?php 
        if (!empty($season_products)){
            foreach ($season_products as $s_p) {      
    ?>
    <div class="product">
        <a href="<?= base_url ?>producto/view&id=<?= $s_p['id'] ?>">
        <?php if (!empty($s_p['img']) || $s_p['img'] != ''){ ?>
        <img src="uploads/images/<?= $s_p['img'] ?>" />
        <?php } else { ?>
        <img src="assets/img/camiseta.png" />
        <?php } ?>
        <h2> <?= $s_p['producto'] ?> </h2>
        </a>
        <p> <?= $s_p['precio'] ?> </p>
        <a href="<?= $s_p['id'] ?>"> Comprar </a>
    </div>
    <?php
            }
        }
    
    ?>

</div>