<?php
    require_once "conexao.php";
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit;
    }

    $id = $_POST["id"] ?? null;
    $usuario = $_POST["usuario"] ?? "";
    $email = $_POST["email"] ?? "";

    if (!$id) {
        header("Location: usuarios.php");
        exit;
    }

    $sql = "update usuarios set nome = :usuario, email = :email where id_usuario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: usuarios.php?sucesso=editado");
    exit;
?>
