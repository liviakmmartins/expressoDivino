<?php
    include("../../conexao/config.php");
    include("../../../global.php");

    $pasta = "../produtos_img/";
    $imagem = $_FILES['imagem'];

    if(!empty($imagem['name'])){
        $nomeAleatorioImg = uniqid(); //vai gerar um nome aleatorio de id
        $extensao = strtolower(pathinfo($imagem['name'], PATHINFO_EXTENSION));
    
        if($extensao !="jpg" && $extensao != "png"){
            die("Tipo de arquivo não aceito");
        }
    
        $caminho = $pasta . $nomeAleatorioImg . "." . $extensao;
        $imgBanco = $nomeAleatorioImg . "." . $extensao;
        $imgSalva = move_uploaded_file($imagem['tmp_name'], $caminho);
     }


    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    $categoria = $_POST['categoria'];
    $tipo = $_POST['tipo'];

    $sql = "INSERT INTO produto(nome, preco, imagem, categoria, tipo) VALUES ('$nome','$preco','$imgBanco','$categoria','$tipo')";

    if($conexao->query($sql)){
        header("Location:../../admin/view/index.php");
    }
