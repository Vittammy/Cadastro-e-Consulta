<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Cadastro:</h1>

    <form action="" method="POST">

        <div class="conteudo">
            Código do Produto: <input type="text" name="codigo" required>
            Nome do Produto: <input type="text" name="produto" required>
            Data de Validade: <input type="date" name="data_validade" required>
            Valor (R$): <input type="number" name="preco" required>
        </div>

        <div class="botoes">
            <button type="submit">Cadastrar</button>
            <button type="reset">Limpar</button>
        </div>

        <?php

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

            $codigo = $_POST['codigo'];
            $produto = $_POST['produto'];
            $data_validade = $_POST['data_validade'];
            $preco = $_POST['preco'];

            try {

                $conecta = new PDO("mysql:host=127.0.0.1; port=3306; dbname=empresa", "root", "");
                $conecta->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $texto = "INSERT INTO produtos( codigo, produto, data_validade, preco ) VALUES ( ?, ?, ?, ? )";
                $s = $conecta->prepare($texto);

                // Associa os valores das interrogações às variaveis
                $s->bindParam(1, $codigo);
                $s->bindParam(2, $produto);
                $s->bindParam(3, $data_validade);
                $s->bindParam(4, $preco);

                // Executa para inserir os dados no banco
                $s->execute();

                echo "Produto salvo com sucesso!";
            } 
            
            catch (PDOException $erro) {
                echo 'Falha na conexão.';
            }

        }

        ?>
    </form>

    <div class="voltar"><a href="index.html">Voltar </a></div>
</body>

</html>