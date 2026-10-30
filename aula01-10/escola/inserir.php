<!DOCTYPE html>
<html lang="pt-br">
 
<head>
<meta charset="UTF-8">
<title>Novo Aluno</title>
</head>
 
<body>
 
    <h1>Novo Aluno</h1>
 
    <form action="salvar.php" method="POST">
 
        <p>
<label>Nome:</label><br>
<input type="text" name="nome" required>
</p>
 
        <p>
<label>E-mail:</label><br>
<input type="email" name="email" required>
</p>
 
        <p>
<label>Curso:</label><br>
<input type="text" name="curso" required>
</p>
 
        <button type="submit">
            Salvar
</button>
 
    </form>
 
    <p>
<a href="index.php">Voltar</a>
</p>
 
</body>
</html>