<?php
session_start();
 
$erro = "";
 
if ($_SERVER["REQUEST_METHOD"] == "POST") {
 
    $usuario = $_POST["usuario"];
    $senha = $_POST["senha"];
 
    if ($usuario == "aluno" && $senha == "1234") {
 
        $_SESSION["usuario"] = $usuario;
 
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
 
        </form>
 
        <small>Projeto didático de PHP</small>
 
    </div>
 
</body>
</html>