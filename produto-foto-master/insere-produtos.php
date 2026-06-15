<?php
require_once("conexao.php");

$msg = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $cd_produto    = trim($_POST['cd_produto']);
    $ds_produto    = trim($_POST['ds_produto']);
    $qt_quantidade = $_POST['qt_quantidade'];
    $vl_unitario   = str_replace(",", ".", $_POST['vl_unitario']);

    $nomeFoto = null;

    //UPLOAD DA FOTO
    if (isset($_FILES['ds_foto']) && $_FILES['ds_foto']['error'] == 0) {

        $pasta = "uploads/";

        //Cria a pasta caso não exista
        if (!is_dir($pasta)) {
           // mkdir(caminho, permissao)
           //Leitura, gravação e execução
           // 0755 Permissão quando está em produção.
            mkdir($pasta, 0777, true);
        }
        //pathinfo - Obtem a extensão do arquivo.
        $extensao = pathinfo($_FILES['ds_foto']['name'], PATHINFO_EXTENSION);

        //$nomeFoto = uniqid() . "." . $extensao;
        //uniquid - Gera um id único
        //basename - Pega apenas o nome do arquivo.
        $nomeFoto = uniqid() . "_" . basename($_FILES['ds_foto']['name']);

        move_uploaded_file($_FILES['ds_foto']['tmp_name'], $pasta . $nomeFoto);
    }

    try {

        $sql = "INSERT INTO tb_produto
                (
                    cd_produto,
                    ds_produto,
                    qt_quantidade,
                    vl_unitario,
                    ds_foto
                )
                VALUES
                (
                    :cd_produto,
                    :ds_produto,
                    :qt_quantidade,
                    :vl_unitario,
                    :ds_foto
                )";

        $stmt = $pdo->prepare($sql);

        $stmt->bindValue(":cd_produto", $cd_produto);
        $stmt->bindValue(":ds_produto", $ds_produto);
        $stmt->bindValue(":qt_quantidade", $qt_quantidade);
        $stmt->bindValue(":vl_unitario", $vl_unitario);
        $stmt->bindValue(":ds_foto", $nomeFoto);

        $stmt->execute();

        $msg = "Produto cadastrado com sucesso!";

    } catch (PDOException $e) {

        $msg = "Erro ao cadastrar: " . $e->getMessage();
    }
}
?>
