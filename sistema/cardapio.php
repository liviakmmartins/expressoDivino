<?php
require("./conexao/config.php");
session_start();
// session_destroy();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cardápio</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/cardapio.css">

    <!--importando fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Courgette&family=Urbanist&display=swap" rel="stylesheet" />

   <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- icone add-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />

    <!-- toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

    <!-- icone voltar -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <header>

        <a href="../index.php"class="material-symbols-outlined">
            arrow_back
        </a>

        <a href="carrinho.php" class="material-symbols-outlined">
            shopping_cart
        </a>
 
    </header>
        <div id="logo">
            <img src="../imagens/logo.png" alt="Expresso Divino" srcset="">
            <p>Expresso Divino</p>
        </div>
    <main>
        <h1>Cardápio</h1>
        <table id="cafe_quente">
            <h2>Café</h2>
            <h3>Quentes</h3>
            <?php
            $sql = "SELECT * FROM produto WHERE categoria ='cafe' AND  tipo = 'quente'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                
                echo "
                       <tr>
                       <td>" . $item["nome"] . "</td>
                       <td>R$ " . number_format($item["preco"], 2, ",", ".") . "</td>
                       <td class='material-symbols-outlined' >
                       <a href='#' class='addCarrinho' produto-data='".json_encode($item)."'>add_shopping_cart</a>
                       </td>

                   </tr>
                       ";
            }
            ?>

        </table>
        <table id="cafe_gelado">
            <h3>Gelados</h3>
            <?php
            $sql = "SELECT * FROM produto WHERE categoria ='cafe' AND tipo = 'gelado'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                       <tr>
                       <td>" . $item["nome"] . "</td>
                       <td>R$ " . number_format($item["preco"], 2, ",", ".") . "</td>
                       <td class='material-symbols-outlined' >
                       <a href='#' class='addCarrinho' produto-data='".json_encode($item)."'>add_shopping_cart</a>
                       </td>

                   </tr>
                       ";
            }
            ?>
        </table>
        <h2>Acompanhamentos</h2>
        <table id="acomp_doce">
            <h3>Doces</h3>
            <?php
            $sql = "SELECT * FROM produto WHERE categoria ='acompanhamento' AND tipo = 'doce'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                       <tr>
                       <td>" . $item["nome"] . "</td>
                       <td>R$ " . number_format($item["preco"], 2, ",", ".") . "</td>
                       <td class='material-symbols-outlined' >
                       <a href='#' class='addCarrinho' produto-data='".json_encode($item)."'>add_shopping_cart</a>
                       </td>

                   </tr>
                       ";
            }
            ?>
        </table>
        <table id="acomp_salgado">
            <h3>Salgados</h3>
            <?php
            $sql = "SELECT * FROM produto WHERE categoria ='acompanhamento' AND tipo = 'salgado'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                       <tr>
                       <td>" . $item["nome"] . "</td>
                       <td>R$ " . number_format($item["preco"], 2, ",", ".") . "</td>
                       <td class='material-symbols-outlined' >
                       <a href='#' class='addCarrinho' produto-data='".json_encode($item)."'>add_shopping_cart</a>
                       </td>
                   </tr>
                       ";
            }
            ?>
        </table>
    </main>
    <footer>
        © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>
</body>

<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/addCarrinho.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>

</html>