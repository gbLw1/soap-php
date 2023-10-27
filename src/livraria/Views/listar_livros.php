<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Livros</title>
</head>

<body>
    <H1>Lista de Livros</H1>
    <table border="1">
        <tr>
            <th>Título</th>
            <th>Ano</th>
            <th>Preço</th>
        </tr>

        <?php
        if (is_array($retorno)) {
            foreach ($retorno as $dado) {
                echo "<tr>";
                echo "<td>" . $dado->titulo . "</td>";
                echo "<td>" . $dado->ano . "</td>";
                echo "<td>" . $dado->preco . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</body>





















</html>
