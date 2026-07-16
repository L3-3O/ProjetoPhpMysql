<?php require_once 'componentes/conexao.php' ?>
<?php require_once 'componentes/config.php' ?>

<?php 


?>

<?php 


$con = Config::connect();



$sql = "SELECT email, senha
        FROM usuarios ";

$stmt = $con->query($sql);

$dados = $stmt->fetch(PDO::FETCH_ASSOC);

$emaildb= $dados['email'];
$senhadb= $dados['senha'];

?>