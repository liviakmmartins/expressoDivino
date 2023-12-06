<?php 
session_start();
if(isset($_SESSION['usuario'])){
    header("Location:../../../index.php");
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tela de login</title>
    <link rel="stylesheet" href="../../../css/reset.css">
    <link rel="stylesheet" href="../../../css/loginCadastro.css">
    <!-- importando fonte-->
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

       <h1>Área de Login</h1>
       <div id="logo">
        <img src="../../../imagens/logo.png" alt="">
        <p>Expresso Divino</p>
       </div>
   </header>
   <main>
   <?php 
    if(isset($_SESSION['erroLogin'])){
        echo '<div class="erro"><p><span>ERRO: </span>' .  $_SESSION['erroLogin'] . '</p></div>';
        unset($_SESSION['erroLogin']);
    }

    ?>
       <form action="../controller/login.php" method="post">
        <label for="iemail">E-mail</label>
        <input type="email" name="email" id="iemail" placeholder="E-mail" required >
        <label for="isenha">Senha</label>
        <input type="password" name="senha" id="isenha" placeholder="Senha" required min="8">
        <button type="submit">Enviar</button>
       </form>
       <p>Ainda não tem uma conta? Clique <a href="cadastro.php">aqui</a> e cadastre-se agora</p>
   </main>
   <footer>
    © Desenvolvido por Livia Martins, futura desenvolvedora full stack
</footer>
</body>
</html>