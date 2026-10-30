<?php
    require "conexao.php";

    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    $sql = "INSERT INTO alunos (nome, email, curso) VALUES
    (:nome, :email, :curso)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":email" => $email,
        ":curso" => $curso
    ]);

    header("Location: index.php");