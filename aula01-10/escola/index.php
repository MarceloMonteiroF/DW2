<?php
    require_once "conexao.php";
    $sql = "SELECT * FROM alunos ORDER BY id";
    $stmt = $pdo->query($sql);

    $alunos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

 <!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>CRUD de Alunos</title>
</head>

<body>

    <h1>Cadastro de Alunos</h1>

    <p>
        <a href="">
            <button>Novo Aluno</button>
        </a>
    </p>

    <table border="1" cellpadding="10">

        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Curso</th>
            <th>Ações</th>
        </tr>


            <tr>

                <td>
                                    </td>

                <td>
                                    </td>

                <td>
                                    </td>

                <td>
                                    </td>

                <td>

                    <a href="">
                        Editar
                    </a>

                    |

                    <a href=""
                       onclick="return confirm('Deseja excluir este aluno?')">
                        Excluir
                    </a>

                </td>

            </tr>

            </table>

</body>
</html>