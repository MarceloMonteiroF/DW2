<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <!-- TODO: Inserir o cabeçalho aqui -->
     <?php include "includes/cabecalho.php"?>

    <!-- TODO: Inserir o menu aqui -->
     <?php include "includes/menu.php"?>

    <main class="container">

        <h2>Bem-vindo ao Portal!</h2>

        <p>
            Olá,
            <?= htmlspecialchars($_SESSION["usuario"]) ?>!
        </p>

        <div class="card">

            <h3>Página Inicial</h3>

            <p>
                Este site foi desenvolvido para
                aprender PHP e reutilização
                de componentes.
            </p>

        </div>
        
</main>

    <?php include "includes/rodape.php"?>

</body>
</html>
