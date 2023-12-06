<?php 
include("../../conexao/config.php");

$select = "SELECT * FROM produto";
$query = mysqli_query($conexao,  $select);

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conexao, "DELETE FROM produto WHERE id=$id");
    
} 
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel Administrativo</title>
    <!-- <link rel="stylesheet" href="../../../css/reset.css"> -->
    <link rel="stylesheet" href="../../../css/adicionar.css">
  
    <!-- importando fonte-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Courgette&family=Urbanist&display=swap" rel="stylesheet">

    <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- importando icone -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body> 
    <header>
        <img src="../../../imagens/logo.png" alt="Expresso Divino" srcset="">
        <p>Expresso Divino</p>

    </header>
    <h1>Produtos Adicionados</h1>
    <div id="tabela">
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Preço</th>
                <th>Imagem</th>
                <th>Categoria</th>
                <th>Tipo</th>
                <th>Deletar</th>
            </tr>
            <?php
            $sql = "SELECT * FROM produto WHERE categoria = 'cafe' AND tipo = 'quente'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                    <div>
                        <tr>
                            <td>" . $item["nome"] . "</td>
                            <td>" . number_format($item["preco"],2,",",".") . "</td>
                            <td>" . $item["imagem"] . "</td>
                            <td>" . $item["categoria"] . "</td>
                            <td>" . $item["tipo"] . "</td>
                            <td>
                             <a href='index.php?id=" . $item["id"] . "' class='material-symbols-outlined'>Delete</a>
                            </td>
                        </tr>
                    </div>
                ";
            }
            $sql = "SELECT * FROM produto WHERE categoria = 'cafe' AND tipo = 'gelado'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                    <div>
                        <tr>
                            <td>" . $item["nome"] . "</td>
                            <td>" . number_format($item["preco"],2,",",".") . "</td>
                            <td>" . $item["imagem"] . "</td>
                            <td>" . $item["categoria"] . "</td>
                            <td>" . $item["tipo"] . "</td>
                            <td>
                            <a href='index.php?id=" . $item["id"] . "' class='material-symbols-outlined'>Delete</a>
                           </td>
                        </tr>
                    </div>
                ";
            }
            $sql = "SELECT * FROM produto WHERE categoria = 'acompanhamento' AND tipo = 'doce'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                    <div>
                        <tr>
                            <td>" . $item["nome"] . "</td>
                            <td>" . number_format($item["preco"],2,",",".") . "</td>
                            <td>" . $item["imagem"] . "</td>
                            <td>" . $item["categoria"] . "</td>
                            <td>" . $item["tipo"] . "</td>
                            <td>
                            <a href='index.php?id=" . $item["id"] . "' class='material-symbols-outlined'>Delete</a>
                           </td>
                        </tr>
                    </div>
                ";
            }
        
            $sql = "SELECT * FROM produto WHERE categoria = 'acompanhamento' AND tipo = 'salgado'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                    <div>
                        <tr>
                            <td>" . $item["nome"] . "</td>
                            <td>" . number_format($item["preco"],2,",",".") . "</td>
                            <td>" . $item["imagem"] . "</td>
                            <td>" . $item["categoria"] . "</td>
                            <td>" . $item["tipo"] . "</td>
                            <td>
                            <a href='index.php?id=" . $item["id"] . "' class='material-symbols-outlined'>Delete</a>
                           </td>
                        </tr>
                    </div>
                ";
            }
            $sql = "SELECT * FROM produto WHERE categoria = 'outro' AND tipo = 'outro'";
            $res = $conexao->query($sql);
            while ($item = $res->fetch_assoc()) {
                echo "
                    <div>
                        <tr>
                            <td>" . $item["nome"] . "</td>
                            <td>" . number_format($item["preco"],2,",",".") . "</td>
                            <td>" . $item["imagem"] . "</td>
                            <td>" . $item["categoria"] . "</td>
                            <td>" . $item["tipo"] . "</td>
                            <td>
                            <a href='index.php?id=" . $item["id"] . "' class='material-symbols-outlined'>Delete</a>
                           </td>
                        </tr>
                    </div>
                ";
            }
            $conexao->close();
            ?>
        </table>
    </div>

        <a href="../../produto/view/adicionar.php"><div id="adicionar">Adicionar</div></a>
    <footer>
        © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>

</body>

</html>