<?php 
include('../../conexao/config.php');

if(isset($_GET['id']) && isset($_GET['status'])){
    $id = $_GET['id'];
    $status = $_GET['status'];

    mysqli_query($conexao, "UPDATE pedido SET status='".$status."' WHERE id=$id");
    
    header("Location:../../admin/view/pedidos.php");
} 
?>