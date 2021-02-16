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
    <title>Supermercado</title>
</head>
<body>
    <section>
        <div>
            <a href="../index.php">Voltar</a>
            <form action="action.php" method="POST">
                <h1>Editar Produto '<?php echo $_SESSION['nome']?>'</h1>
                <span>Nome:</span>
                <input type="text" name="nome" placeholder="<?php echo $_SESSION['nome']?>"><br/>
                <span>Quantia:</span>
                <input type="text" name="quantia" placeholder="<?php echo $_SESSION['quantia']?>"><br/>
                <span>Preço:</span>
                <input type="text" name="preco" placeholder="<?php echo $_SESSION['preco']?>"><br/>
                <input type="submit" value="Editar">
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
                <samp class="erro"> Item editado com Sucesso. </samp>
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
    </section> 
</body>
</html>