<?php
$host = "Localhost";
$porta = "3307";
$banco = "fatec";
$usuario = "root";
$senha = "";

try {
        $pdo = new PDO("mysql:host=$host;port=$porta;dbname=$banco;charset=utf8mb4",
        $usuario,
        $senha
        );

        $pdo->setAttribute(
            PDO::ATTR_ERRMODE,
            PDO::ERRMODE_EXCEPTION
        );

    } catch (PDOException $erro) {
        die("Erro na conexão: " . $erro->getMessage());
    }
?>