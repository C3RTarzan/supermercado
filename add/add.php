<?php
session_start();
include("../Class/connection.php");

if(empty($_POST['nome']) || empty($_POST['preco']) || empty($_POST['quantia'])){ //checar se tem campos em branco   
    $_SESSION['campos_branco'] = true;
    header('Location: index.php'); // se for para onde vai ser redirecionado
    exit();
 }

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

function idproduct($size = 4){
    $chars = "123456789";
    $randomString = '';
    for($i = 0; $i < $size; $i = $i+1){
        $randomString .= $chars[mt_rand(0,8)];
    }
    return $randomString;
}
$idproduct = idproduct();
$idproduct_ok = "#$idproduct";

while(true){
    $query = "select * from products where idproduct = '$idproduct'";
    $result = mysqli_query($conexao, $query);
    $row = mysqli_num_rows($result);
    if($row > 0){
        function idproduct($size = 4){
            $chars = "123456789";
            $randomString = '';
            for($i = 0; $i < $size; $i = $i+1){
                $randomString .= $chars[mt_rand(0,8)];
            }
            return $randomString;
        }
        $idproduct = idproduct();
        $idproduct_ok = "#$idproduct";
    }else{
        break;
    }
}


$query = "INSERT into products (nome, idproduct, quantia, preco) VALUES ('$nome', '$idproduct_ok', '$quantia', '$preco')";
$result = mysqli_query($conexao, $query);

header('Location: index.php');
$_SESSION['codigo'] = $idproduct_ok;
$_SESSION['OK'] = true;

?>