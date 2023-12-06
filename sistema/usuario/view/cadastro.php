<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de cadastro</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/loginCadastro.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bricolage+Grotesque:opsz,wght@10..48,300&family=Courgette&family=Urbanist&display=swap" rel="stylesheet">

    <!-- importando fonte logo -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">

    <!-- icone voltar -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
</head>
<body>
    <header>
    <a href="../../../index.php" class="material-symbols-outlined">
            arrow_back
        </a>

        <h1>Área de Cadastro</h1>
        <div id="logo">
       <img src="../../../imagens/logo.png" alt="">
       <p>Expresso Divino</p>
       </div>
    </header>
    <main>
    <?php
    session_start();
    if (isset($_SESSION['erroCadastro'])) {
        echo '<div class="erro"><p><span>ERRO</span>: ' .  $_SESSION['erroCadastro'] . '</p></div>';
        unset($_SESSION['erroCadastro']);
    }
    ?>

        <form action="../controller/cadastro.php" method="POST">
            <label for="inome">Nome completo</label>
            <input type="text" name="nome" id="inome" placeholder="Nome completo" required>
            <label for="itel">Número de telefone</label>
            <input type="tel" name="telefone" id="itel" placeholder="Número de telefone">
            <label for="iemail">E-mail</label>
            <input type="email" name="email" id="iemail" placeholder="E-mail" required>
            <label for="isenha">Senha</label>
            <input type="password" name="senha" id="isenha" placeholder="Senha" required min="8">
            <button type="submit">Enviar</button>
        </form>
        <p>Já possui uma conta? Clique <a href="login.php">aqui</a> e faça login agora</p>
    </main>
    <footer>
        © Desenvolvido por Livia Martins, futura desenvolvedora full stack
    </footer>
</body>
</html>