<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autores</title>
</head>

<body>
    <form action="#" method="POST">
        <label>Escolha um autor:</label>
        <select name="autor">
            <?php
            if (is_array($retorno)) {
                foreach ($retorno as $dado) {
                    echo "<option value='{$dado->idautor}'>{$dado->nome}</option>";
                }
            }
            ?>
        </select>
        <br /><br />
        <input type="submit">
    </form>
</body>

</html>
