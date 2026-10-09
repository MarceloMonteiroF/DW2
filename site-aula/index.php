<?php
session_start();
require_once "conexao.php";
 
$erro = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = trim($_POST["usuario"] ?? "");
    $senha = $_POST["senha"] ?? "";

    $sql = "SELECT id_usuario, nome, senha FROM usuarios WHERE nome = :usuario";

    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":usuario", $usuario);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($resultado && password_verify($senha, $resultado["senha"])) {
        $_SESSION["usuario"] = $resultado["nome"];
        $_SESSION["id_usuario"] = $resultado["id"];

        header("Location: inicio.php");
        exit;
 
    } else {
        $erro = "Usuário ou senha incorretos!";
    }
}
?>
 
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Login - Portal do Aluno</title>
<link rel="stylesheet" href="estilo.css">
</head>
<body class="login">
 
    <div class="login-box">
 
        <h1>Portal do Aluno</h1>
<p>Faça seu login</p>
 
        <?php if ($erro != ""): ?>
<p class="erro">
<?= $erro ?>
</p>
<?php endif; ?>
 
        <form method="POST">
 
            <input type="text"
                   name="usuario"
                   placeholder="Usuário"
                   required>
 
            <input type="password"
                   name="senha"
                   placeholder="Senha"
                   required>
 
            <button type="submit">Entrar</button>
            <a href="criarUser.php">Criar novo usuário</a>
 
        </form>
 
        <small>Projeto didático de PHP</small>
 
    </div>
 
</body>
</html>