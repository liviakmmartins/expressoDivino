<?php 
include('../../conexao/config.php');
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedidos</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/pedido.css">

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

</head>
<body>
    <header>
    <div id="logo">
       <img src="../../../imagens/logo.png" alt="">
       <p>Expresso Divino</p>
    </div>
    <div id="home">
        <a href="../../../index.php">Página Inicial</a>
    </div>
    </header>

    <main>
    <h1>Pedidos</h1>

        <?php 
        echo"
        <div id='pedidos'>";
        $sql = "SELECT 
                    pedido.id,
                    pedido.status,
                    pedido.valor_total,
                    GROUP_CONCAT(
                        JSON_OBJECT(
                            'id', produto.id,
                            'nome', produto.nome,
                            'quantidade', pedido_produto.quantidade,
                            'preco_unitario', produto.preco,
                            'categoria', produto.categoria,
                            'tipo', produto.tipo
                        )
                    ) AS produtos
                FROM 
                    pedido
                INNER JOIN 
                    pedido_produto ON pedido.id = pedido_produto.id_pedido
                INNER JOIN 
                    produto ON pedido_produto.id_produto = produto.id
                WHERE
                    pedido.id_usuario = " . $_SESSION['usuario']->id . "
                GROUP BY
                    pedido.id, pedido.status, pedido.valor_total";

            $res = $conexao->query($sql);

            if ($res) {
                while ($item= $res->fetch_assoc()) {
                    // Converte a string JSON para um array associativo
                    $produtos = json_decode('[' . $item['produtos'] . ']', true);
            
                    // Exibe as informações do pedido
                    // $item['status'] = 'preparando';

                    echo "<div id='card'>";
                    
                    if($item['status']=='aguardando_preparo'){
                        echo"
                            <div id='aguardando_preparo'>
                                <p>Aguardando Preparo</p>
                            </div>
                        ";
                    }else if($item['status']=='preparando'){
                        echo"
                            <div id='preparando'>
                            <p>Preparando</p>
                            </div>
                        ";
                    }else if($item['status']=='pronto'){
                        echo"
                            <div id='pronto'>
                            <p>Pronto</p>
                            </div>
                        ";
                    }else{
                        echo"
                            <div id='cancelado'>
                                <p>Cancelado</p>
                            </div>
                        ";
                    }

                    // Exibe as informações de cada produto no pedido
                    foreach ($produtos as $produto) {

                        $preco_produto = $produto['quantidade'] * $produto['preco_unitario'];

                        echo "<p>" . $produto['quantidade'] . "x ". $produto['nome'] . "<br/>
                        <span id='valor_pequeno'>(".$produto['quantidade'] . "x R$". number_format($produto['preco_unitario'], 2, ',', '.') . " = R$ " .number_format($preco_produto, 2, ',', '.'). ")</span><br/>";

                    }



                    echo "
                        <p id='total'>Valor Total: R$ " .number_format($item['valor_total'], 2, ',', '.') . "</p>";

                        if($item['status']=='aguardando_preparo'){
                            echo"
                            <a href='../../pedido/controller/statusPedido.php?id=" . $item["id"]."&status=cancelado'>
                                <button id='cancelado'>Cancelar Pedido</button>
                            </a>
                            <a href='../../pedido/controller/statusPedido.php?id=" . $item["id"]."&status=preparando'>
                                <button id='preparando'>Preparar Pedido</button>
                            </a>
                            ";
                        }else if($item['status']=='preparando'){
                            echo"
                                <div id='preparando'>
                                <p>Preparando</p>
                                </div>
                            ";
                        }else if($item['status']=='pronto'){
                            echo"
                                <div id='pronto'>
                                <p>Pronto</p>
                                </div>
                            ";
                        }
                    
            echo "</div>";

        
                }
            } else {
                echo "Erro na consulta: " . $conexao->error;
            }
            
            $conexao->close();

            echo "</div>";
    ?>


    </main>


    <footer>
    </footer>
</body>
<!-- </html>
<div id="card">
        <p id="status">Aguardando preparo</p>
        <p>--quandidade c/nome e valores</p>
        <p>--valor total</p>
        <button id="preparando">Preparando</button>
        <button id="pronto">Aguardando retirada</button>
        <button id="cancelado">Cancelado</button>
</div> -->
