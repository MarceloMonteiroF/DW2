<?php
    require"conexao.php";
    $id = $_POST["id"];
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $curso = $_POST["curso"];

    $sql = "UPDATE alunos SET 
                nome = :nome,
                email = :email,
                curso = :curso
                WHERE id = :id";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":nome" => $nome,
        ":email" => $email,
        ":curso" => $curso,
        ":id" => $id
    ]);

    header("Location: index.php");