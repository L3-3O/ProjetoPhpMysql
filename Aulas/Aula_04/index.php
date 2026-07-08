<?php require_once dirname(__DIR__) . '../componentes/rotas.php' ?>
<!doctype html>
<html lang="en" data-bs-theme="dark">

<head>
    <title>Title</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />

    <!-- Bootstrap CSS v5.3.8 -->
    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB"
        crossorigin="anonymous" />
</head>

<body>
    <?php require_once '../Componentes/nav.php' ?>
    <?php require_once '../Componentes/header.php' ?>

    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Condicional if</h3>
                    <h4>1.Igualdade</h4>
                    <?php
                    $valor = 13

                    ?>

                    <?php
                    if ($valor == 100) {
                        echo  "Valor " . $valor . " é igual a 100";
                    } else {
                        echo "Valor " . $valor . " não é 100";
                    }
                    ?>

                    <h4>2.Intervalo</h4>
                    <p><?php
                        if ($valor > 100) {
                            echo "Valor " . $valor . " é maior que 100";
                        } else {

                            echo "Valor " . $valor . " é menor do que 100";
                        } ?></p>

                    <h4>Recebendo valores de links</h4>
                    Cique no link para ativar ou desativar uma ação.
                    <a href="?acao=1" class="btn btn-success btn-sm">
                        Ativar Ação
                    </a>

                    <a href="?acao=2" class="btn btn-danger btn-sm">
                        Desativar Ação
                    </a>

                    <a href="?acao=0" class="btn btn-default btn-sm">
                        Resetar Ação
                    </a>

                    <?php
                    if (!empty($_GET['acao'])) {

                        if ($_GET['acao'] == 1) {

                            echo '<div class ="mt-3 alert alert-success" role="alert">
    Ação Ativada.
</div>
';
                        } else {
                            echo '<div class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
    Ação Desativada.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
</div>
';
                        }
                    }
                    ?>
                    <h4>if e else if</h4>

                    <br>
                    <h5>Desafio 1 Verificação de maioridade</h5>
                    <?php
                    $idade = 20
                    ?>
                    <?php
                    if ($idade >= 18) {
                        echo "Idade Maior ou igual a 18 Anos";
                    } else {
                        echo "Idade menor que 18 Anos";
                    }
                    ?>
                    <h5>Desafio 2-Resultado do aluno</h5>

                    <a href="?media=4" class="btn btn-danger btn-sm">Média 4</a>    
                    <a href="?media=5" class="btn btn-warning btn-sm">Média 6</a>    
                    <a href="?media=7" class="btn btn-success btn-sm">Média 7</a>    
                    <a href="?" class="btn btn-default btn-sm">Resetar</a>    
                    <?php
                    $mediaA = 3;
                    $Aluno = "Leo"
                    ?>

                    <?php
                    if(!empty($_GET['media']) >= 7) {
                        echo '<div class="alert alert-success" role="alert">
                                Aluno aprovado!
                            </div>';
                    } else if(!empty($_GET['media']) <=6) {
                        echo "<div class='alert alert-warning'>Aluno em recuperação.</div>";
                    } else{}

                    ?>

                    <h5>Desafio 3 Classificação escolar com elseif</h5>

                    <?php
                    $media = 10
                    ?>
                    <?php
                    if ($media >= 7) {
                        echo "Aprovado";
                    } else if ($media >= 4) {
                        echo "Recuperação";
                    } else {
                        echo "Reprovado";
                    }
                    ?>


                </div>
            </div>
        </div>
    </main>
    <footer>
        <!-- place footer here -->
    </footer>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>