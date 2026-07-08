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

    <?php $numaula = "Aula 6-Arrays" ?>
    <?php require_once APP_COMPONENTES . '/nav.php' ?>
    <?php require_once APP_COMPONENTES . '/header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <?php
                    $produtos1 = ["Mouse", "Teclado", "Monitor"];

                    echo $produtos1[0];
                    echo "<br>";
                    echo $produtos1[1];
                    echo "<br>";
                    echo $produtos1[2];
                    ?>
                    <h4>Array +foreach</h4>
                    <?php
                    $pessoas = [
                        "Leo",
                        "Paula lins",
                        "Roberto Carlos",
                        "Maria do carmo",
                        "Jose Lima",
                        "Eduardo campos"

                    ];

                    foreach ($pessoas as $key => $gente) {

                        echo $key + 1 . $gente . "<br>";
                    }
                    ?>

                    <h3>Array Associativa</h3>

                    <?php
                    $pessoas = [
                        "Nome" => " Leo",
                        "Idade" =>  26,
                        "Naturalidade" => " Fortaleza"
                    ];
                    ?>
                    <p>Dados do Usuario</p>
                    Nome: <?php echo $pessoas["Nome"]; ?><br>
                    Idade:<?= $pessoas["Idade"]; ?><br>
                    Naturalidade:<?php echo $pessoas["Naturalidade"]; ?>

                    <br>---------------<br>

                    <?php
                   $produtos2 = [ 
                        [
                            "nome" => "Teclado",
                            "preco" => 120.00,
                            "estoque" => 5
                        ],
                        [
                            "nome" => "Mouse",
                            "preco" => 80.00,
                            "estoque" => 10
                        ],
                        [
                            "nome" => "Monitor",
                            "preco" => 750.00,
                            "estoque" => 3
                        ]
                    ];

                   echo $produtos2[1]["nome"];
                    ?>

                    <br>
                    <br>

                    <h4>Desafio 1</h4>

                    <?php 
                    $categorias = [
                        "informatica",
                        "escritorio" ,
                        "eletronica" ,
                            "RH" ,
                        "administração"

                    ];

                    foreach  ($categorias as $lugares){
                       echo  $lugares. "<br>";
                    }
                       
                    ?>
                    <br>
                    <br>
                    <h4>Desafio 2</h4>
                    <?php 
                    $produtos = [

                    "mouse",
                    "teclado",
                    "monitor",
                    "fones",
                    "jogos"


                    ];
                    foreach ($produtos as $equipamentos) {
                        echo $equipamentos."<br>";
                    }
                    ?>
                    <br>
                    <br>
                    <h4>Desafio 3</h4>

                </div>
            </div>
        </div>
    </main>
    <?php require_once '../Componentes/footer.php' ?>
    <!-- Bootstrap JavaScript Bundle (includes Popper) -->
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI"
        crossorigin="anonymous"></script>
</body>

</html>