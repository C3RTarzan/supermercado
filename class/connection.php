<?php

define('HOST', 'LocalHost');
define('USUARIO', 'root');
define('SENHA', '');
define('BD', 'supermercado');

$conexao = mysqli_connect(HOST, USUARIO, SENHA, BD) or die ('Não Conectou!!');

?>