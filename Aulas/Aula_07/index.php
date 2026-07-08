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

    <?php $numaula = "Aula 7" ?>
    <?php require_once APP_COMPONENTES . '/nav.php' ?>
    <?php require_once APP_COMPONENTES . '/header.php' ?>
    <main>
        <div class="container">
            <div class="row">
                <div class="col-12">

                    <h1>Padrões Config</h1>
                    <h3>Data: <?= $data; ?></h3><br>
                    <h3>Hora: <?= $hora; ?></h3><br>
                    <h3>Databr: <?= databr(); ?></h3><br>
                    <h3>Horabr: <?= horabr(); ?></h3><br>

                    <h1>Encriptar dados</h1>
                    <?php $codigo = "123456"; ?><br>
                    <h3> Código: <?= $codigo; ?></h3><br>
                    <?php $enc = encrypt_secure($codigo, 'e'); ?><br>
                    <h3>Codigo Encriptado: <?= $enc  ?></h3><br>

                    <h3>Codigo Decriptado: </h3>
                    <h3>Encript no link:</h3>
                    <a href="?enc=<?php echo urlencode($enc); ?>">Link Encriptado</a>
                    <?php if (!empty($_GET['enc'])) {
                        echo encrypt_secure($_GET['enc'], 'd');
                    } ?> <br>

                    <?php $codigo2 = "654321" ?>
                    <?php $enc2 = encrypt_secure($codigo2, 'e'); ?>
                    <a href="?enc2=<?php echo urlencode($enc2); ?>">Link Encriptado 2</a>
                    <?php if (!empty($_GET['enc2'])) {
                        echo encrypt_secure($_GET['enc2'], 'd');
                    } ?>



                    <form method="post" class="card card-body shadow-sm mb-4">
                        <h4>Input text + botão</h4>

                        <label for="produto_busca" class="form-label">Nome do produto</label>

                        <div class="input-group">
                            <input type="text" class="form-control" id="chave" name="nome" placeholder="Digite o nome do produto">
                            <button type="submit" class="btn btn-primary">Pesquisar</button>
                        </div>
                    </form>

                    <?php if (!empty($_POST['nome'])) {
                    } ?>
                    Post encriptado: <?php echo $encpost = encrypt_secure($_POST['nome'], 'e'); ?><br>
                    Post Decriptado: <?php echo $decpost = encrypt_secure($encpost, 'd'); ?>


                    <form method="post" class="card card-body shadow-sm mb-4">
                        <h4>Login e senha</h4>

                        <div class="mb-3">
                            <label for="email_login" class="form-label">E-mail</label>
                            <input type="email" class="form-control" id="email_login" name="login" placeholder="Digite seu e-mail">
                        </div>

                        <div class="mb-3">
                            <label for="senha_login" class="form-label">Senha</label>
                            <input type="password" class="form-control" id="senha_login" name="senha" placeholder="Digite sua senha">
                        </div>

                        <button type="submit" class="btn btn-success">Entrar</button>
                    </form>


                <?php if(!empty($_POST['login'])){
                    $login = encrypt_secure($_POST['login'], 'e'); 
                    $declogin = encrypt_secure($login, 'd'); 
                    
                }?> 
                

                Login Encriptado: <?= $login??'Não definido' ?><br>
                Login Decriptado: <?= $declogin??'Não definido'  ?><br>
                
                
                <?php if(!empty($_POST['senha'])){
                    $senha = encrypt_secure($_POST['senha'], 'e'); 
                    $decsenha=encrypt_secure($senha, 'd');
                    } ?>

                Senha Encriptado: <?= $senha??'Não definido' ?><br>
                Senha Decriptado: <?= $decsenha??'Não definido'  ?><br>

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