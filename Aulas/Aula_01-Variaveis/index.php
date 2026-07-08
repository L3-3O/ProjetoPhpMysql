<?php require_once dirname(__DIR__). '../componentes/rotas.php'?>
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

    <!-- NAV -->
    <?php $numaula = "Aula 1" ?>
    <?php require_once '../Componentes/nav.php' ?>
    <!-- Header -->
    <?php require_once '../Componentes/header.php' ?>


    <div class="container">
        <div class="row">
            <div class="col-12">


                <h1>Desafio 1</h1>
                <?php

                $Nome = "LE∅";
                $Idade = "26";
                $Profissão = "Técnico";
                $Salario = "99999999";
                $Estado = "CE";
                $Email = "leonatan2500@gmail.com";
                $Celular = "85987079878";
                $DataNascimento = "01/04/2000";


                ?>

                <table class="table table-bordered table-hover align-middle mb-0">
                    <tbody>
                        <tr>
                            <th class="bg-dark w-25">
                                <i class="bi bi-person-fill me-2"></i>Nome
                            </th>
                            <td><?= $Nome ?></td>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-cake2-fill me-2"></i>Idade
                            </th>
                            <td><?= $Idade ?></td>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-briefcase-fill me-2"></i>Profissão
                            </th>
                            <td><?= $Profissão ?>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-cash-stack me-2"></i>Salário
                            </th>
                            <td><?= $Salario ?>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-geo-alt-fill me-2"></i>Estado
                            </th>
                            <td><?= $Estado ?>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-envelope-fill me-2"></i>E-mail
                            </th>
                            <td><?= $Email ?></td>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-phone-fill me-2"></i>Celular
                            </th>
                            <td><?= $Celular ?></td>
                        </tr>

                        <tr>
                            <th class="bg-dark">
                                <i class="bi bi-calendar-date-fill me-2"></i>Data de Nascimento
                            </th>
                            <td><?= $DataNascimento ?></td>
                        </tr>
                    </tbody>
                </table>

                <h1>Desafio 2</h1>
                <?php
                $produto = "Notebook Gamer Dell G15";
                $categoria = "Notebook";
                $preço = "R$ 6.600";
                $estoque = "33 Unidades";
                ?>

                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th width="250">Produto</th>
                                            <th><?= $produto??'Não definido'; ?></th>


                                        </tr>

                                        <tr>
                                            <th width="250">Categoria</th>
                                            <th><?= $categoria ?? 'Não definido'; ?> </th>


                                        </tr>

                                        <tr>
                                            <th width="250">Preço</th>
                                            <th><?= $preço ?? 'Não definido'; ?></th>


                                        </tr>
                                        <tr>
                                            <th width="250">Estoque</th>
                                            <td><?= $estoque ?? 'Não definido'; ?></td>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">

                </div>
            </div>
        </div>

    </main>
    <!-- footer -->
    <?php require_once '../Componentes/footer.php' ?>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>

