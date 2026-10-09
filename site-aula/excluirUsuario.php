<?php
    require_once "conexao.php";
    session_start();

    if (!isset($_SESSION["usuario"])) {
        header("Location: index.php");
        exit;
    }

    $id = $_GET["id"] ?? null;

    if (!$id) {
        header("Location: usuarios.php");
        exit;
    }

    $sql = "delete from usuarios where id_usuario = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":id", $id);
    $stmt->execute();

    header("Location: usuarios.php?sucesso=excluido");
    exit;
?>
