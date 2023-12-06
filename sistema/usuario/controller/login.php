<?php

include('../../conexao/config.php');
session_start();


if(empty($_POST['email']) || empty($_POST['senha'])){//se os campos estiverem vazios...
    header("Location:../view/login.php");//vai mandar para o login
}

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'"; //seleciona todos dfa tabela email onde o o campo digitado é igual ao dado do bd e a senha tambem

$res = $conexao->query($sql) or die($conexao->error); //executa a conexão e caso ela não consiga ser feita, da erro

$usuario = $res->fetch_object(); //transforma o resultado em uma rede de objetos

$qtd = $res->num_rows; //resultado éexecuta o numero de linhas(que é a qtd)

if ($qtd > 0) {
    $_SESSION['usuario'] = $usuario;

    header("Location:../../../index.php");
} else {
    $_SESSION['erroLogin'] = "Usuário e/ou senha incorretos!";

    header("Location:../view/login.php");
}
