<?php 
include('../../conexao/config.php');
session_start();

    $id_usuario = $_SESSION['usuario']->id; 

    $valor_total= $_SESSION['valor_total'];

    $sql = "INSERT INTO pedido(id_usuario,status, valor_total) VALUES ('$id_usuario','aguardando_preparo','$valor_total')";

    if(mysqli_query($conexao, $sql)){
        $id_pedido = mysqli_insert_id($conexao);

        foreach($_SESSION['carrinho'] as $produto){

            $id_produto = $produto['id'];
            $quantidade = $produto['quantidade'];

            $sql = "INSERT INTO pedido_produto(id_pedido, id_produto, quantidade) VALUES ('$id_pedido','$id_produto','$quantidade')";

            mysqli_query($conexao, $sql);

        }
        unset($_SESSION['carrinho']);
        header("Location:../view/realizar.php");
    }else{
        echo "ERROR:" . $sql . "</br>" . mysqli_error($conexao);
    }
    mysqli_close($conexao);
     


?>