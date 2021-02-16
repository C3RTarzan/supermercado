<?php
session_start();
include("class/connection.php");
$query = "SELECT * from products";
$result = mysqli_query($conexao, $query);
$row = mysqli_num_rows($result);

for($i = 0; $i < $row; $i++){
    $dado = mysqli_fetch_array($result);
    $idproduct = $dado['idproduct'];
    $nome = $dado['nome'];
    $preco = $dado['preco'];
    $quantia = $dado['quantia'];
    echo "<form action='action.php' method='POST'>";
    echo "<span class='sp'>Nome: </span>";
    echo "<span class='item'>$nome</span>";
    echo "<br/><span class='sp'>Preço: </span>";
    echo "<span class='item'>$preco</span>";
    echo "<br/><span class='sp'>Quantia: </span>";
    echo "<span class='item'>$quantia</span>";
    echo "<br/><span class='sp'>ID: </span>";
    echo "<span class='item'>$idproduct</span>";
    echo "<br/><input type='submit' class='apagar' name= 'apagar$i' value='Apagar'>";
    echo "<input type='submit' name= 'editar$i' value='Editar'><br/>";
    echo "</form>";
}

?>