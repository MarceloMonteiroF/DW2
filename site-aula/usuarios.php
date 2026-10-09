<?php
    session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit;
}
    require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Início</title>
    <link rel="stylesheet" href="estilo.css?v=5">
</head>
<body>

    <!-- TODO: Inserir o cabeçalho aqui -->
     <?php include "includes/cabecalho.php"?>

    <!-- TODO: Inserir o menu aqui -->
     <?php include "includes/menu.php"?>

    <main class="container">

        <h2>Lista de usuários</h2>

        <div class="card">

            <h3>Lista</h3>

            <table class="tabela">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Ações</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                        $sql = "SELECT id_usuario, nome, email FROM usuarios";
                        $stmt = $pdo->query($sql);
                        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

                        foreach ($usuarios as $usuario) {
                            $email = $usuario["email"] ?? "";
                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($usuario["id_usuario"]) . "</td>";
                            echo "<td>" . htmlspecialchars($usuario["nome"]) . "</td>";
                            echo "<td>" . htmlspecialchars($email) . "</td>";
                            echo "<td>";
                            echo "<button type='button' class='btn-editar' data-id='" . htmlspecialchars($usuario["id_usuario"], ENT_QUOTES) . "' data-nome='" . htmlspecialchars($usuario["nome"], ENT_QUOTES) . "' data-email='" . htmlspecialchars($email, ENT_QUOTES) . "'>Editar</button> ";
                            echo "<button type='button' class='btn-excluir' data-id='" . htmlspecialchars($usuario["id_usuario"], ENT_QUOTES) . "'>Excluir</button>";
                            echo "</td>";
                            echo "</tr>";
                        }
                    ?>
                </tbody>
            </table>

        </div>
        
</main>

    <div class="modal" id="modalEditar">
        <div class="modal-caixa">
            <button type="button" class="modal-fechar" id="fecharModal">&times;</button>

            <h3>Editar usuário</h3>

            <form action="editarUsuario.php" method="POST">
                <input type="hidden" name="id" id="editarId">

                <label for="editarNome">Nome</label>
                <input type="text" name="usuario" id="editarNome" required>

                <label for="editarEmail">Email</label>
                <input type="email" name="email" id="editarEmail">

                <button type="submit">Salvar alterações</button>
            </form>
        </div>
    </div>

    <?php if (isset($_GET["sucesso"])): ?>
        <?php
            $mensagemSucesso = "";

            if ($_GET["sucesso"] === "editado") {
                $mensagemSucesso = "Usuário editado com sucesso!";
            } elseif ($_GET["sucesso"] === "excluido") {
                $mensagemSucesso = "Usuário excluído com sucesso!";
            }
        ?>

        <?php if ($mensagemSucesso): ?>
            <div class="modal aberto" id="modalSucesso">
                <div class="modal-caixa modal-sucesso">
                    <h3>Sucesso</h3>
                    <p><?php echo htmlspecialchars($mensagemSucesso); ?></p>
                    <button type="button" id="fecharSucesso">OK</button>
                </div>
            </div>
        <?php endif; ?>
    <?php endif; ?>

    <?php include "includes/rodape.php"?>

    <script>
        const modalEditar = document.getElementById("modalEditar");
        const editarId = document.getElementById("editarId");
        const editarNome = document.getElementById("editarNome");
        const editarEmail = document.getElementById("editarEmail");
        const fecharModal = document.getElementById("fecharModal");

        document.querySelectorAll(".btn-editar").forEach((botao) => {
            botao.addEventListener("click", () => {
                editarId.value = botao.dataset.id;
                editarNome.value = botao.dataset.nome;
                editarEmail.value = botao.dataset.email;
                modalEditar.classList.add("aberto");
            });
        });

        fecharModal.addEventListener("click", () => {
            modalEditar.classList.remove("aberto");
        });

        modalEditar.addEventListener("click", (evento) => {
            if (evento.target === modalEditar) {
                modalEditar.classList.remove("aberto");
            }
        });

        document.querySelectorAll(".btn-excluir").forEach((botao) => {
            botao.addEventListener("click", () => {
                const confirmar = confirm("Tem certeza que deseja excluir este usuário?");

                if (confirmar) {
                    window.location.href = "excluirUsuario.php?id=" + encodeURIComponent(botao.dataset.id);
                }
            });
        });

        const modalSucesso = document.getElementById("modalSucesso");
        const fecharSucesso = document.getElementById("fecharSucesso");

        if (modalSucesso && fecharSucesso) {
            fecharSucesso.addEventListener("click", () => {
                modalSucesso.classList.remove("aberto");
                window.history.replaceState(null, "", "usuarios.php");
            });
        }
    </script>

</body>
</html>
