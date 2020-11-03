<!DOCTYPE HTML>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title> Tienda de camisetas </title>
        <link rel="stylesheet" href="assets/css/estilo.css" type="text/css" />

    </head>
    <body>

        <div class="container">
            <header id="header">
                <div id="logo"> 
                    <img src="assets/img/camiseta.png" alt="CAMISETA LOGO">
                    <a href="index.php">
                        E - CAMISETAS  
                    </a>
                </div>
            </header>

            <nav id="menu">
                <ul>
                    <li>
                        <a href="#"> Inicio </a>
                    </li>
                    <li>
                        <a href="#"> Categoria 1 </a>
                    </li>
                    <li>
                        <a href="#"> Categoria 2 </a>
                    </li>
                    <li>
                        <a href="#"> Categoria 3 </a>
                    </li>
                    <li>
                        <a href="#"> Categoria 4 </a>
                    </li>
                </ul>
            </nav>

            <div id="content">
                <aside>
                    <div id="login" class="block_aside">
                        
                        <div id="title-login"><a href="#"> Entra a la WEB </a></div>
                        
                        <form action="" method="POST">
                            <label for="email"> Usuario: </label><br/>
                            <input type="email" name="email" /><br/>

                            <label for="password"> Contraseña: </label><br/>
                            <input type="password" name="email" /><br/>

                            <input type="submit" value="Entrar" id="btn-enviar" /><br/><br/>
                        </form>

                        <section>
                            <span></span><a href="#"> Mis pedidos </a><br/>
                            <span></span><a href="#"> Gestionar pedidos </a><br/>
                            <span></span><a href="#"> Gestionar categorias </a><br/>
                        </section>
                      
                    </div>
                </aside>

                <div id="central">
                    <div id="mas_vendido">
                        
                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>
                        
                    </div>
                    <div id="ultimo">
                        
                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>
                        
                    </div>
                    <div id="temporada">
                        
                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>

                        <div class="product">
                            <img src="assets/img/camiseta.png" />
                            <h2> Camistea Azul Ancha </h2>
                            <p> $ 120 </p>
                            <a href="#"> Comprar </a>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
            
            <footer id="footer">
                <p> Desarrollado por VIC &COPY; <?= date('Y'); ?> </p>
            </footer>

        </div>
    </body>
</html>

