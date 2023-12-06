<?php 
    include('../../conexao/config.php');

    session_start();

    $nome = mysqli_real_escape_string( $conexao, $_POST['nome']);
    $telefone = mysqli_real_escape_string( $conexao, $_POST['telefone']);
    $email = mysqli_real_escape_string( $conexao, $_POST['email']);
    $senha = mysqli_real_escape_string( $conexao, $_POST['senha']);

    if($nome && $telefone && $email && $senha){
        $sql = "SELECT * FROM usuario WHERE email = '$email'";

        $res = mysqli_query($conexao, $sql);

        $row = $res->fetch_object();
        $qtd = mysqli_num_rows($res);

        if($qtd > 0){
            $_SESSION['erroCadastro']=  "Usuário já cadastrado!";
            header("Location:../view/cadastro.php");
         }else{
            $sql = "INSERT INTO usuario(nome, telefone, email, senha) VALUES ('$nome','$telefone','$email','$senha')";
        if(mysqli_query($conexao, $sql)){
            header("Location:../view/login.php");
        }else{
            echo "ERROR:" . $sql . "</br>" . mysqli_error($conexao);
        }
        mysqli_close($conexao);
         }
    }else{
        echo "Preencha todos os campos!";
    }
