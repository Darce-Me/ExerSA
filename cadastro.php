<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = $_POST['aluno'];
    $curso = $_POST['curso'];

    require("conexao.php");

    $inserir = "INSERT INTO matricula (nome,curso) VALUES ('$nome','$curso')";

    if (mysqli_query($conexao, $inserir)) {

        echo "
        <script>

        alert('Cadastro Realizado com sucesso!');
        window.location.href = 'cadastro.php';
        
        </script>";
        exit();
    } else {
        echo "
        <script>

        alert('Erro ao cadastrar:" . mysqli_error($conexao) . "';
        window.history.back();
        
        </script>";
        exit();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Curso</title>
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

    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-5">
        <div class="card shadow border-0 rounded-4" style="width: 100%; max-width: 450px;">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <h1 class="h3 fw-bold text-primary">
                        Cadastro de Curso
                    </h1>

                    <p class="text-muted">
                        Preencha os dados do cadastro
                    </p>
                </div>
            </div>
            <form method="post" action="">
                <div class="mb-3">
                    <!-- Input nome do aluno -->
                    <label for="aluno" class="form-label fw-semibold">
                        Nome do aluno:
                    </label>
                    <input type="text" class="form-control form-control-lg" id="aluno" name="aluno"
                        placeholder="Digite o nome do aluno" required>
                    <br>
                    <!-- Input nome do curso -->
                    <label for="curso" class="form-label fw-semibold">
                        Curso:
                    </label>
                    <input type="text" class="form-control form-control-lg" id="curso" name="curso"
                        placeholder="Informe o curso matriculado">
                    <br>
                    <!-- Botões -->
                    <div class=" container d-flex justify-content-center align-items-center gap-3 py-5">
                        <button type="submit" class="btn-solid theme-primary btn-lg">Cadastrar</button>
                        <button type="reset" class="btn-solid theme-secondary btn-lg">Limpar</button>
                    </div>
                </div>
        </div>
    </div>

    </div>

    </form>
    </div>

    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL"
        crossorigin="anonymous"></script>
</body>

</html>