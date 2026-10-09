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
    <title>Sobre</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <!-- TODO: Inserir o cabeçalho aqui -->
     <?php include "includes/cabecalho.php" ?>

    <!-- TODO: Inserir o menu aqui -->
     <?php include "includes/menu.php" ?>

    <main class="container">

        <h2>Sobre o Projeto</h2>

        <div class="card">

            <h3>Quem Somos?</h3>

            <p>
                Somos uma equipe de estudantes
                aprendendo desenvolvimento web.
            </p>

            <p>
                Nosso objetivo é desenvolver
                aplicações utilizando HTML,
                CSS e PHP.
            </p>

        </div>

    </main>

    <!-- TODO: Inserir o rodapé aqui -->
        <?php include "includes/rodape.php" ?>

</body>
</html>