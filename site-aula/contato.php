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
    <title>Contato</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <!-- TODO: Inserir o cabeçalho aqui -->
     <?php include "includes/cabecalho.php" ?>

    <!-- TODO: Inserir o menu aqui -->
     <?php include "includes/menu.php" ?>

    <main class="container">

        <h2>Entre em Contato</h2>

        <div class="card">

            <form>

                <label>Nome:</label>
                <input type="text" required>

                <label>E-mail:</label>
                <input type="email" required>

                <label>Mensagem:</label>
                <textarea rows="5" required></textarea>

                <button type="submit">
                    Enviar
                </button>

            </form>

            <p>
                Formulário demonstrativo.
                Nenhuma mensagem será enviada.
            </p>

        </div>

    </main>

    <!-- TODO: Inserir o rodapé aqui -->
    <?php include "includes/rodape.php" ?>

</body>
</html>