<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title> Tienda de camisetas </title>
        <link rel="stylesheet" href="<?=base_url?>assets/css/estilo.css" type="text/css" />

    </head>
    <body>

        <div class="container">
            <header id="header">
                <div id="logo"> 
                    <img src="<?=base_url?>assets/img/camiseta.png" alt="CAMISETA LOGO">
                    <a href="<?=base_url?>">
                        E - CAMISETAS  
                    </a>
                </div>
            </header>

            <nav id="menu">
                <ul>
                    <li>
                        <a href="<?=base_url?>"> Inicio </a>
                    </li>
                    
                    <?php 
                        $categories = Utls::showCategories();
                        //var_dump($categories);
                        if (!empty($categories)){
                            foreach ($categories as $category) {
                    ?>
                                <li>
                                    <a href="<?= base_url.'categoria/ver&id='.$category['id'] ?>"> <?= $category['categoria'] ?> </a>
                                </li>
                    <?php          
                            }
                        }
                    ?>
                    
                </ul>
            </nav>

            <div id="content">
