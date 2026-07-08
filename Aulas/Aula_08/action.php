<?php require_once dirname(__DIR__) . '../componentes/config.php' ?>

<?php if(!empty($_GET['nomeUser'])){
    $Nomeuser = filter_input(INPUT_GET,'nomeUser',FILTER_SANITIZE_SPECIAL_CHARS);
    $_SESSION['Nomeuser'] = $Nomeuser ;

    
} ?>


<?php if(!empty($_GET['senhaUser'])){
      $Senhauser = filter_input(INPUT_GET,'senhaUser',FILTER_SANITIZE_SPECIAL_CHARS);
    $encsenha= $_SESSION['Senhauser'] = encrypt_secure($Senhauser,'e') ;
;} ?>

<?php 
if(!empty($_POST['email_login'])&&!empty($_POST['senha_login'])){
$user="Leo@gmail.com";
$senha="kyurVYAMJhBqI5es/9nUYT1hd5z484HLiQF0CyKFEcIJURrAZqarDmzume1hMAs7dLQgvAuoaG7auan86zGUWA==";
echo $emailogin=filter_input(INPUT_POST,'email_login',FILTER_SANITIZE_SPECIAL_CHARS);
echo $senhalogin=filter_input(INPUT_POST,'senha_login',FILTER_SANITIZE_SPECIAL_CHARS);
}
?>



<?php 
//codigo para retorno automatico  limpando o cache
//o header esta expulsando da pagina
//exit(); esta limpando o cache da pagina
// header("Location:index.php");
// exit();
?>