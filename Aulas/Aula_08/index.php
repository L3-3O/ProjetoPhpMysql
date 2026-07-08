<?php require_once dirname(__DIR__) . '../componentes/rotas.php' ?>
<?php require_once dirname(__DIR__) . '../componentes/config.php' ?>
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

    <?php $numaula = "Aula 8" ?>
    <?php require_once APP_COMPONENTES . '/nav.php' ?>
    <?php require_once APP_COMPONENTES . '/header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h3>Uso de $_SESSION</h3>
                    <a class="btn btn-success btn-sm" href="action.php?nomeUser=Leo">Nome Usuario:Leo</a>

                    <a class="btn btn-warning btn-sm" href="action.php?senhaUser=L123456">Senha Usuario:L123456</a>
                    <?php


                    ?>

                    <P>
                        <?php if (!empty($_SESSION['Nomeuser'])) {
                            echo $_SESSION['Nomeuser'];
                        } else {
                            echo "vazio";
                        } ?>
                    </P>


                    <P>
                        Senha encriptada:
                        <?php if (!empty($_SESSION['Senhauser'])) {
                            echo $_SESSION['Senhauser'];
                        } ?>
                    </P> <br>

                    <p>Senha decriptada
                        <?php if (!empty($_SESSION['Senhauser'])) {
                            echo encrypt_secure($_SESSION['Senhauser'], 'd');
                        } ?>
                    </p>
               
                    <h3>Login com autenticação</h3>

                    <a href="paineladmin.php">Painel Admin</a>


                    <form method="post" action="action.php" class="card card-body shadow-sm mb-4">
                        <h4>Login e senha</h4>

                        <div class="mb-3">
                            <label for="email_login" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email_login" name="email_login" placeholder="Digite seu e-mail">
                        </div>

                        <div class="mb-3">
                            <label for="senha_login" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha_login" name="senha_login" placeholder="Digite sua senha">
                        </div>

                        <button type="submit" class="btn btn-success">Entrar</button>
                    </form>
                    <p>
                        <?php 
                        $produto="Celular";
                        $valor=10;
                        $quantidade=2;
                        $resultado = $valor * $quantidade;
                        ?>
                        Produto: <?= $produto ?> <br>
                        Valor: <?= $valor ?> <br>
                        Quantidade:<?= $quantidade ?> <br>
                        Resultado: <?= $resultado ?> <br>
                    </p>

                    <p>
                        <?php 
                        $banco="Inter";
                        $saldo=587;
                        $deposito=100;
                        $saldo_total= $saldo + $deposito;

                        ?>

                        Nome do banco: <?= $banco ;?><br>
                        Saldo: <?= $saldo ;?> <br>
                        Deposito: <?= $deposito; ?> <br>
                        Saldo Atual: <?= $saldo_total ?> <br> 

                    </p>

                    <p>
                        <?php 
                        $produto="Geladeira";
                        $valor=50;
                        $desconto=20;
                        $valor_final= $valor-$desconto;

                        ?>

                        Produto: <?= $produto ;?><br>
                        Valor: <?= $valor ;?><br>
                        Desconto: <?= $desconto ;?><br>
                        Valor final: <?= $valor_final;?><br>
                    </p>

                    <p>
                        <?php 
                        $email="leo@gmail.com";
                        $enc= encrypt_secure($email,'e');
                        $dec= encrypt_secure($enc,'d');

                        ?>

                        Email: <?= $email ?><br>
                        Email encriptado: <?= $enc ?><br>
                        Email decriptado: <?= $dec ?> <br>




                    </p>

                    <p>
                    <a href="?chave=we252563">Link</a>
                    <?php 
                    if(!empty($_GET['chave'])){
                        
                        $chave=$_GET['chave'];
                        $encV= encrypt_secure($chave, 'e');
                        $decV= encrypt_secure($encV,'d');
                    }
                    ?>
                    <br>Variavel: <?= $chave??'' ?>
                    <br>Variavel encriptada: <?= $encV??'' ?>
                    <br>Variavel decriptada: <?= $decV??'' ?>

                    </p>


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