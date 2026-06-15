
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="stylesheet" href="css/produtos.css">

    <title>Cadastro de Produtos</title>

   
</head>
<body>

    <div class="container">

        <h1>Cadastro de Produtos</h1>

        <form method="POST" action="insere-produtos.php" enctype="multipart/form-data">

            <div class="form-group">
                <label>Código do Produto</label>
                <input type="text"
                       name="cd_produto"
                       maxlength="16"
                       required>
            </div>

            <div class="form-group">
                <label>Descrição do Produto</label>
                <input type="text"
                       name="ds_produto"
                       maxlength="80"
                       required>
            </div>

            <div class="form-row">

                <div class="form-group">
                    <label>Quantidade</label>
                    <input type="number"
                           name="qt_quantidade"
                           min="1"
                           required>
                </div>

                <div class="form-group">
                    <label>Preço Unitário</label>
                    <input type="number"
                           step="0.01"
                           name="vl_unitario"
                           required>
                </div>

            </div>

            <div class="form-group">

                <label>Foto do Produto</label>

                <input type="file"
                       name="ds_foto"
                       id="foto"
                       accept="image/*">

                <div class="preview" id="preview">

                    <span>Preview da imagem</span>

                </div>

            </div>

            <button type="submit" class="btn">
                Salvar Produto
            </button>

        </form>

    </div>

    <script>

        const foto = document.getElementById('foto');
        const preview = document.getElementById('preview');

        foto.addEventListener('change', function(){

            const arquivo = this.files[0];

            if(arquivo){

                const leitor = new FileReader();

                leitor.onload = function(e){

                    preview.innerHTML =
                        `<img src="${e.target.result}">`;
                }

                leitor.readAsDataURL(arquivo);
            }
        });

    </script>

</body>
</html>