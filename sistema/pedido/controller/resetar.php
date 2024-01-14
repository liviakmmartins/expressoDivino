<?php 
include('../../conexao/config.php');


if(isset($_GET['id'])){
    $id = $_GET['id'];
    // $delete = mysqli_query($conexao, "DELETE FROM pedido WHERE id=$id");
    
    // $delete = mysqli_query($conexao, "DELETE FROM pedido_produto WHERE id_pedido=$id");

    mysqli_query($conexao, "UPDATE pedido SET status='cancelado' WHERE id=$id");
    
    header("Location:../view/realizar.php");
} 
?>