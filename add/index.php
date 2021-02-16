<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css.css">
    <title>ADD</title>
</head>
<body>
    <section>
        <div>
            <div>
                <form action="add.php" method="POST">
                    <h1>Adicionar Produtos</h1><br/>
                    <span>Nome do produto:</span><br/>
                    <input type="text" name="nome" required><br/>
                    <span>Preço:</span><br/>
                    <input type="text" name="preco" required><br/>
                    <span>Quantidade em  estoque:</span><br/>
                    <input type="text" name="quantia" required><br/>
                    <input type="submit" name="add" value="Adicionar Produto"><br/>
                    <a href="../index.php">Voltar</a>
                </form>
                <div>
                    <?php
                        if(isset($_SESSION['campos_branco'])): ?>
                    <samp class="erro"> Preencha todos os campos. </samp>   
                    <?php
                        endif;
                        unset($_SESSION['campos_branco']);
                    ?>

                    <?php
                        if(isset($_SESSION['OK'])): ?>
                    <samp class="erro"> Item registrado com Sucesso. </samp>
                    <samp class="erro2"> Codigo: <?php echo $_SESSION['codigo'];?> </samp>  
                    <?php
                        endif;
                        unset($_SESSION['OK']);
                    ?>

                    <?php
                        if(isset($_SESSION['no_number'])): ?>
                    <samp class="erro"> Quantia invalida. </samp>   
                    <?php
                        endif;
                        unset($_SESSION['no_number']);
                    ?>

                    <?php
                        if(isset($_SESSION['no_price'])): ?>
                    <samp class="erro"> Preço invalido. </samp>   
                    <?php
                        endif;
                        unset($_SESSION['no_price']);
                    ?>
                </div>
            </div>
        </div>
    </section>
</body>
</html>