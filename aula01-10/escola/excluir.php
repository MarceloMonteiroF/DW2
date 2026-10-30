<?php
    require"conexao.php";

    $id = $_GET["id"];

    $sql = "DELETE FROM alunos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);
    header("Location: index.php");