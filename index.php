<?php 
  require("sistema/conexao/config.php");
  session_start();
  ?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Expresso Divino</title>
    <link rel="stylesheet" href="./css/reset.css" />
    <link rel="stylesheet" href="./css/index.css" />

        <!-- icone add-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- icone cardapio -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />

    <!-- icone calendario -->
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200"
    />
    <!--importando fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Courgette&family=Urbanist&display=swap"
      rel="stylesheet"/>

    <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    
      <!-- toastify -->
      <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

  </head>
  <body>
    <header>
      <div id="logo">
        <img src="./imagens/logo.png" alt="Expresso Divino" srcset="">
        <p>Expresso Divino</p>
      </div>
      
        <div id="links">
            <div id="carrinho">
              <a href="./sistema/carrinho.php">
                <div class="material-symbols-outlined">shopping_cart</div>
              </a>
            </div>
            
            <?php
            if(isset($_SESSION["usuario"])){
             echo  '
              <div id="pedidos">
                <a href="./sistema/pedido/view/realizar.php">Pedidos</a>

                <a href="./sistema/pedido/view/realizar.php">Meus pedidos</a>
              </div>
              
              <div id="login">
                <a href="./sistema/usuario/controller/logout.php">Sair</a>
              </div> 
';
          }else{
            echo  '
            <div id="login">
              <a href="./sistema/usuario/view/login.php">Entrar</a>
            </div> ';
          }
          ?>
        </div>
    </header>
    
    <main>
      <nav>
        <!-- mobile -->
        <section id="mobile">
          <a href="./sistema/cardapio.php">
            <span class="material-symbols-outlined"> menu_book </span><br />
            Cardápio
          </a>
          <a href="./sistema/horario.html">
            <span class="material-symbols-outlined"> calendar_month </span
            ><br />
            Horário
          </a>
        </section>

        <!-- desktop -->
        <section id="desktop">
          <a href="./sistema/cardapio.php">
            <div class="menu">Cardápio</div>
          </a>
          <a href="sistema/horario.html">
            <div class="menu">Horário de atendimento</div>
          </a>
        </section>
      </nav>
      <h1>Ofertas Imperdíveis!!</h1>
      <section id="ofertas">
        <?php 
              $sql = "SELECT *FROM produto WHERE categoria ='outro' AND tipo ='outro'";
              $res = $conexao->query($sql);
              while($item = $res->fetch_assoc()){
                echo"
                <div class='produto'>
                  <div class='imagem'>
                    <img src='./sistema/produto/produtos_img/". $item['imagem'] . "' alt='Imagem' />
                  </div>

                  <div class='descricao'>
                    <p>" . $item['nome'] . "</p>
                    <p>R$ ". number_format($item['preco'], 2, ',', '.') . "</p>

                    <a href='#' class='addCarrinho' produto-data='".json_encode($item)."'>Adicionar ao carrinho</a>
                  </div>
                </div>
                ";
              }
            ?>
 
      </section>
    </main>
    <footer>
      © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>
  </body>
  <script src="./js/jquery-3.7.1.min.js"></script>
  <script src="./js/addCarrinhoHome.js"></script>
  <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</html>
