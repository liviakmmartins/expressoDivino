<?php
include("./conexao/config.php");
session_start();
// session_destroy();
if (!isset($_SESSION['usuario'])) {
    header("Location:./usuario/view/login.php");
}
?>
<a href="../"></a>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho</title>
    <link rel="stylesheet" href="../css/reset.css">
    <link rel="stylesheet" href="../css/carrinho.css">

    <!--importando fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Courgette&family=Urbanist&display=swap" rel="stylesheet">

    <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- importando icone -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

    <!-- toastify -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">

</head>

<body>
    <header>
        <a href="../index.php"><div>Home</div></a>
        <a href="./cardapio.php"><div>Cardápio</div></a>
    </header>
    <main>
        <div id="logo">
            <img src="../imagens/logo.png" alt="Expresso Divino" srcset="">
            <p>Expresso Divino</p>
        </div>

        <?php
        if(isset($_SESSION['sucesso'])){
            echo '<p class="sucesso">' .  $_SESSION['sucesso'] . '</p>';
            unset($_SESSION['sucesso']);
        }        
        ?>

<div id="tabela">
    <table>
        <tr style="text-align: left;">
                    <th>Nome</th>
                    <!-- <th>Categoria</th>
                    <th>Tipo</th> -->
                    <th>Quantidade</th>
                    <th>Preço</th>
                    <th>Deletar</th>
                </tr>

                <?php
                if (isset($_SESSION['carrinho']) && is_array($_SESSION['carrinho'])) {
                    $soma = 0;
                    foreach ($_SESSION['carrinho'] as $item) : 
                    $preco =$item['preco']*$item['quantidade'];
                    ?>
                        <div id="tabela">
                            <tr>
                                <td><?php echo $item['nome']; ?></td>
                                <td class="qtd"><?php echo $item['quantidade']; ?></td>
                                <td>
                                    R$ <?php echo number_format($preco, 2, ",", "."); ?> 
                                    <small>
                                        (<?php echo $item['quantidade'] . "x R$ ". number_format($item['preco'], 2, ",", ".")?>)
                                    </small>
                                </td>
                                <td>
                                    <a href="#" class="remCarrinho" produto-id=<?php echo $item['id']; ?>>
                                        <span class="material-symbols-outlined">delete</span>
                                    </a>
                                </td>
                            </tr>
                        </div>
                    <?php $soma += $item['preco'] * $item['quantidade'];
                        $_SESSION['valor_total'] = $soma;

                    endforeach;
                    ?>
                    <tr id="resultado">
                        <td class="total" colspan="2" style="font-weight: bold;">Valor total</td>
                        <td class="total" colspan="2"><?php echo "R$ " . number_format($soma, 2, ",", ".") ?></td>
                    </tr>
            </table>
        </div>
        <?php 
                } else {
                    echo '
                    <tr>
                        <td colspan="4" style="text-align: center;"><p>Carrinho vazio.</p></td>
                    </tr>';
                }
        ?>

        <div id="pedido">
            <?php 
            if(isset($_SESSION['carrinho'])){
               echo "
               <div>
                    <a href='./produto/controller/limparCarrinho.php'>Limpar Carrinho</a>
                </div>
                <div>
                    <a href='./pedido/controller/realizar.php'>Realizar Pedido</a>
                </div>
              "; 
            //   header("Location:carrinho.php");
            }
            ?>

        </div>

    </main>
    <footer>
        © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>
</body>

</html>
<script src="../js/jquery-3.7.1.min.js"></script>
<script src="../js/remCarrinho.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
