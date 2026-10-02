<?php
    require "conexao.php";
    $id = $_GET['id'];

    $sql = "SELECT * FROM alunos WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        ":id" => $id
    ]);

    $aluno = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Editar Aluno</title>
</head>

<body>

    <h1>Editar Aluno</h1>

    <form action="atualizar.php" method="POST">

        <input name="id" value="<?= $aluno["id"] ?>">

        <p>
            <label>Nome:</label><br>

            <input type="text" name="nome" value="<?= htmlspecialchars($aluno["nome"]) ?>" required>
        </p>

        <p>
            <label>E-mail:</label><br>

            <input type="email" name="email" value="<?= htmlspecialchars($aluno["email"]) ?>" required>
        </p>

        <p>
            <label>Curso:</label><br>

            <input type="text" name="curso" value="<?= htmlspecialchars($aluno["curso"]) ?>" required>
        </p>

        <button type="submit">
            Atualizar
        </button>

    </form>

    <p>
        <a href="index.php">Voltar</a>
    </p>

</body>

</html>