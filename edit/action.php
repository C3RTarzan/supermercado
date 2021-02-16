<?php
session_start();
include("../Class/connection.php");

if(empty($_POST['nome']) || empty($_POST['preco']) || empty($_POST['quantia'])){ //checar se tem campos em branco   
    $_SESSION['campos_branco'] = true;
    header('Location: index.php'); // se for para onde vai ser redirecionado
    exit();
 }

$query = "SELECT * from products";
$result = mysqli_query($conexao, $query);
$dado = mysqli_fetch_array($result);
$id = $dado['idproduct'];

$nome =  trim($_POST['nome']);
$preco = trim($_POST['preco']);  
$quantia =  trim($_POST['quantia']);


$virg1 = array(",");
$virg2 = array("");
$tratado_virg = str_replace($virg1, $virg2, $preco);
if(!is_numeric($tratado_virg)){
    $_SESSION['no_price'] = true;
    echo $tratado_virg;
    header('Location: index.php'); // se for para onde vai ser redirecionado
    exit();
}

if(!is_numeric($quantia)){
    $_SESSION['no_number'] = true;
    echo $tratado_virg;
    header('Location: index.php'); // se for para onde vai ser redirecionado
    exit(); 
}

$query = "UPDATE products SET nome = '$nome', preco = '$preco', quantia = '$quantia' WHERE idproduct = '$id'";
$result = mysqli_query($conexao, $query);

$query = "SELECT * from products WHERE idproduct = '$id'";
$result = mysqli_query($conexao, $query);

$row = mysqli_num_rows($result);
$dado = mysqli_fetch_array($result);

$idproduct = $dado['idproduct'];
$_SESSION['nome'] = $dado['nome'];
$_SESSION['preco'] = $dado['preco'];
$_SESSION['quantia'] = $dado['quantia'];
$_SESSION['codigo'] = $idproduct;
header('Location: index.php');
$_SESSION['OK'] = true;

?>