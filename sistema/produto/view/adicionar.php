<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar produtos</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/loginCadastro.css">

    <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- icone voltar -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />

</head>

<body>
    <header>
        <a href="../../admin/view/index.php" class="material-symbols-outlined">
            arrow_back
        </a>

        <h1>Adicionar Produto</h1>

    </header>

        <div id="logo">
            <img src="../../../imagens/logo.png" alt="">
            <p>Expresso Divino</p>
        </div>

    <form enctype="multipart/form-data" action="../controller/adicionar.php" method="POST">
        <label for="inome">Nome: </label>
        <input type="text" name="nome" id="inome">

        <label for="ipreco">Preço: </label>
        <input type="float" name="preco" id="ipreco">

        <label for="iimagem">Imagem: </label>
        <input type="file" name="imagem" id="iimagem">

        <label for="icategoria">Categoria: </label>
        <input type="text" name="categoria" id="icategoria">

        <label for="itipo">Tipo</label>
        <input type="text" name="tipo" id="itipo">

        <button type="submit">Adicionar</button>
        <!-- <p><a href="adicionar.php?deletar="<?php $imagem['id'];?>>Deletar</a></p> -->
    </form>
    <footer>
        © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>

</body>

</html>
