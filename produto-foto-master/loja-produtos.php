<?php
require_once("conexao.php");

$sql = "SELECT 
            cd_produto,
            ds_produto,
            qt_quantidade,
            vl_unitario,
            ds_foto
        FROM tb_produto
        ORDER BY ds_produto ASC";

$stmt = $pdo->prepare($sql);
$stmt->execute();

$produtos = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Produtos</title>
</head>
<body>
    <div class="titulo">
        <h1>Produtos</h1>
    </div>
    <div class="container">
        <?php foreach($produtos as $produto) { ?>
            <div class="card">
                <div class="imagem">
                    <?php if(!empty($produto['ds_foto'])) { ?>
                        <img src="uploads/<?php echo $produto['ds_foto'];
                      ?>">
                    <?php } 
                    else { ?>

                        <div class="sem-imagem">
                            Sem imagem
                        </div>

                    <?php } ?>
                </div>

                <div class="conteudo">
                    <div class="codigo">
                        Código: <?php echo $produto['cd_produto']; ?>
                    </div>
                    <div class="produto">
                        <?php echo $produto['ds_produto']; ?>
                    </div>
                    <div class="quantidade">
                        Quantidade: <?php echo $produto['qt_quantidade']; ?>
                    </div>
                    <div class="preco">
                        R$ <?php echo number_format($produto['vl_unitario'], 2, ',', '.'); ?>
                    </div>
                </div>
            </div>
        <?php } ?>

    </div>

</body>
</html>