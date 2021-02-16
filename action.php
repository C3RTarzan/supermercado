<?php
session_start();
include("class/connection.php");
$query = "SELECT * from products";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

for($i = 0; $i < $row; $i++){
    $dado = mysqli_fetch_array($result);
    $idproduct = $dado['idproduct'];
    $_SESSION['idproduct'] = $dado['idproduct'];
    $nome = $dado['nome'];
    $preco = $dado['preco'];
    $quantia = $dado['quantia'];
    if (isset($_POST["apagar$i"])){
        $query = "DELETE FROM products WHERE idproduct = '$idproduct'";
        $result = mysqli_query($conexao, $query);
        header('Location: index.php');
        exit();
    }
    if (isset($_POST["editar$i"])){
        $_SESSION['nome'] = $nome;
        $_SESSION['preco'] = $preco;
        $_SESSION['quantia'] = $quantia;
        header('Location: edit/index.php');
        exit();
    }
}

?>