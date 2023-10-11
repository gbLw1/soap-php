<?php include("menu.html") ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Livraria</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body class="bg-secondary">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <h1 class="text-white my-4">Livros</h1>
      </div>
    </div>

    <table class="table table-striped table-dark">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Livro</th>
          <th scope="col">Preço</th>
          <th scope="col">Sinopse</th>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach ($json as $livro) {
            echo "<tr>";
              echo "<td>" . $livro->idlivro + 1000 . "</td>";
              echo "<td>". $livro->titulo . "</td>";
              echo "<td>" . number_format($livro->preco, 2, ',', '.') . "</td>";
              echo "<td>" . $livro->sinopse . "</td>";
            echo "</tr>";
          }
        ?>
      </tbody>
    </table>
  </div>
</body>

</html>