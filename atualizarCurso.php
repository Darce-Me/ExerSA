<?php

require("conexao.php");

if (isset($_POST['atualizar'])) {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $curso = $_POST['curso'];

    $atualizar = "UPDATE matricula SET nome = '$nome', curso = '$curso' WHERE id = '$id'";

    if (mysqli_query($conexao, $atualizar)) {
        echo "
        <script>
            alert('Dados atualizado com sucesso');
            window.location='atualizarCurso.php';
        </script>";
        exit();
    } else {
        echo "Erro ai atualizar" . mysqli_error($conexao);
    }
}

$editaAluno = null;

if (isset($_GET['editar'])) {

    $idEditar = $_GET['editar'];

    $resultado = mysqli_query(
        $conexao,
        "SELECT * FROM matricula WHERE id = $idEditar"
    );

    $editaAluno = mysqli_fetch_assoc($resultado);
}

$alunos = mysqli_query(
    $conexao,
    "SELECT * FROM matricula"
);


if (isset($_GET['apagar'])) {
    $id = $_GET['apagar'];

    $deletar = "DELETE FROM matricula WHERE id = $id";

    if (mysqli_query($conexao, $deletar)) {
        echo "
        <script>
            alert('Dado excluido com sucesso!');
            window.location='atualizarCurso.php';
        </script>";
        exit();
    } else {
        echo "Erro ao deletar." . mysqli_error($conexao);
    }
}



?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Alunos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.2/font/bootstrap-icons.min.css">
</head>

<body>
    <nav class="navbar lg:navbar-expand bg-1 fg-2">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.html">Home</a>
            <button class="btn-icon navbar-toggler" type="button" data-bs-toggle="drawer"
                data-bs-target="#navbarNavMenu" aria-controls="navbarNavMenu" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon" aria-hidden="true"></span>
            </button>
            <dialog class="drawer drawer-end" tabindex="-1" id="navbarNavMenu" aria-labelledby="navbarNavMenuLabel">
                <div class="drawer-header">
                    <h5 class="drawer-title" id="navbarNavMenuLabel">Menu</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="drawer" aria-label="Close"></button>
                </div>
                <div class="drawer-body d-flex justify-content-end">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <button class="nav-link" type="button" data-bs-toggle="menu" aria-expanded="false">
                                <i class="bi bi-three-dots"></i>
                            </button>
                            <div class="menu">
                                <a class="menu-item" href="cadastro.php">Cadastro</a>
                                <a class="menu-item" href="atualizarCurso.php">Atualizar Curso</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </dialog>
        </div>
    </nav>

    <div>
        <h2 style="text-align: center;">Lista de Alunos</h2>
    </div>

    <div class="container min-vh-10 d-flex justify-content-start align-items-center">
        <table class="table border">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Curso</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($aluno = mysqli_fetch_assoc($alunos)): ?>
                    <tr>
                        <td><?= $aluno['id'] ?></td>
                        <td><?= $aluno['nome'] ?></td>
                        <td><?= $aluno['curso'] ?></td>

                        <!-- Botões de ação -->
                        <td>
                            <div style="display: flex; gap: 8px;">
                                <a href="?editar=<?= $aluno['id'] ?>" class="btn-solid theme-primary btn-sm">
                                    Editar
                                </a>

                                <a href="?apagar=<?= $aluno['id'] ?>" class="btn-solid theme-primary btn-sm"
                                    onclick="return confirm('Tem certeza que deseja apagar este aluno?')">
                                    Excluir
                                </a>
                            <?php endwhile; ?>
            </tbody>
        </table>

        <?php if ($editaAluno): ?>
        </div>

        <div class="container min-vh-100 d-flex justify-content-start align-items-start py-5">
            <div class="card shadow border-0 rounded-4" style="width: 100%; max-width: 450px;">
                <div class="text-center mb-4">
                    <h3>Editar Aluno</h3>
                    <div class="mb-3">
                        <form method="POST">
                            <input type="hidden" name="id" value="<?= $editaAluno['id'] ?>">

                            <label for="nome" class="form-label fw-semibold">Nome: </label>
                            <input type="text" class="form-control form-control-lg" id="nome" name="nome"
                                value="<?= $editaAluno['nome'] ?>">

                            <label for="curso" class="form-label fw-semibold">Curso: </label>
                            <input type="text" class="form-control form-control-lg" id="curso" name="curso"
                                value="<?= $editaAluno['curso'] ?>">

                            <button type="submit" name="atualizar">Atualizar</button>
                            <a href="atualizarCurso.php">Cancelar</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>

</body>

</html>