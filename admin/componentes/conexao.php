<?php
require_once 'config.php';
$host ="localhost";
$banco="estoque";
$usuario="root";
$senha="";

try{
    $pdo=new PDO(
        "mysqlhost=$host;dbname=$banco;chartset=utf8",
        $usuario,
        $senha
    );

    $pdo->setAttribute(
        PDO::ATTR_ERRMODE,
        PDO::ERRMODE_EXCEPTION
    )
;} catch(PDOException $erro){
    die("Erro na conexão".
    $erro->getMessage())
    
;}
?>

