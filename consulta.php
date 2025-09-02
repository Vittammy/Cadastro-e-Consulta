<?php

    try {
        $conecta = new PDO("mysql:host=127.0.0.1; port=3306; dbname=empresa", "root", "");
        $conecta -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "SELECT * from produtos";
        $result = $conecta -> query($sql);
    }

    catch (PDOException $erro) {
        echo "Falha na conexão";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <h1>Consultar:</h1>

    <table>
        <tr>
            <th>Código</th>
            <th>Produto</th>
            <th>Data de Validade</th>
            <th>Preço (R$)</th>
        </tr>

        <?php foreach ($result as $linha): ?>
            <tr>
                <td><?php echo $linha['codigo']; ?></td>
                <td><?php echo $linha['produto'] ?></td>
                <td>
                    <?php 
                        $dataSQL = $linha['data_validade'];
                        $dataObj = new DateTime($dataSQL);
                        echo $dataObj -> format('d/m/Y'); 
                    ?>
                </td>
                <td><?php echo $linha['preco'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <div class="voltar"><a href="index.html">Voltar </a></div>
</body>
</html>