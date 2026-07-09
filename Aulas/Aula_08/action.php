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
$user="leo@gmail.com";
$senha="niZ349FB/UnMtnsoEYFpV9yLtnI7QE5eOfGt1JKWhjkr8v+MEXVtOGLwKbPTXpdX641IQL4cLNzBw1LmtyDUCg==";
$nome= "Leo";
$senhadec= encrypt_secure($senha,'d');
$emailogin=filter_input(INPUT_POST,'email_login',FILTER_SANITIZE_SPECIAL_CHARS);
$senhalogin=$_POST['senha_login'];
if($emailogin==$user&&$senhalogin==$senhadec){
 $_SESSION['userstatus']=true;
 $_SESSION['nomeuser']=$nome;   
 $_SESSION['tempodeacesso']=time();   
 $_SESSION['dataacesso']=$data;
 header('Location:paineladmin.php');
 exit();   


 } else{
    echo"email: ". $emailogin." e senha ". $senhalogin. " Não conferem.";
    exit();}
}
?>



<?php 
//codigo para retorno automatico  limpando o cache
//o header esta expulsando da pagina
//exit(); esta limpando o cache da pagina
 //header("Location:index.php");
//exit();
?>