<?php 
$error = "";
$sucesso = "";
$usuario = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once "conexao.php";

    $usuario = trim($_POST["usuario"] ?? "");
    $senha = $_POST["senha"] ?? "";
    $email = $_POST["email"] ?? "";
    $senhaConfirmacao = $_POST["senhaConfirmacao"] ?? "";

    if ($usuario === "" || $senha === "") {
        $error = "Preencha todos os campos!";
    } else if ($senha !== $senhaConfirmacao) {
        $error = "As senhas não coincidem!";
    } else if ($email === "") {
        $error = "Preencha o campo de email!";
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Email inválido!";
    } else {
        $sql = "SELECT id_usuario FROM usuarios WHERE nome = :usuario";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
            $error = "Usuário já existe!";
        } else {
            $hashSenha = password_hash($senha, PASSWORD_DEFAULT);
        $sql = "INSERT INTO usuarios (nome, senha, email) VALUES (:usuario, :senha, :email)";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":usuario", $usuario);
            $stmt->bindParam(":senha", $hashSenha);
            $stmt->bindParam(":email", $email);
            $stmt->execute();

            $sucesso = "Usuário criado com sucesso!";
            $usuario = "";
            header("Location: index.php");
            exit;

        }
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
 
        <?php if ($error != ""): ?>
<p class="erro">
<?= $error ?>
</p>
<?php endif; ?>
 
        <form method="POST">
 
            <input type="text"
                   name="usuario"
                   placeholder="Usuário"
                   required>
            
            <input type="email"
                   name="email"
                   placeholder="Email"
                   required>

            <input type="password"
                   name="senha"
                   placeholder="Senha"
                   required>

            <input type="password"
                   name="senhaConfirmacao"
                   placeholder="Confirme a senha"
                   required>
 
            <button type="submit">Criar Usuário</button>
 
        </form>
 
        <small>Projeto didático de PHP</small>
 
    </div>
 
</body>
</html>