<?php 
include('../../../sistema/conexao/config.php');
session_start();

$id = intval($_POST['id']);

$carrinho = isset($_SESSION['carrinho'][$id])?
$_SESSION['carrinho']:array();


if(isset($id)){
    unset($carrinho[$id]);
    
    // $carrinho = array_values($carrinho);
    
    $_SESSION['carrinho']=$carrinho;
    
    $_SESSION['sucesso'] = 'Produto removido do carrinho!';
    
    // header("Location:../../carrinho.php");
}
?>
