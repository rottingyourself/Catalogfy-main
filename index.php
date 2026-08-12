<?php
// Página inicial do site para listagem de produtos cadastrados.
require_once('admin/classes/Produto.class.php');
require_once('admin/classes/Banco.class.php');

$produto = new Produto();
$listaProdutos = $produto->Listar();
?>
<!doctype html>
<html lang="pt_br">

<head>
  <title>Página Inicial</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">

</head>

<body>
<nav class="navbar navbar-expand-sm navbar-dark" style="background-color: #00a;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Página Inicial</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" href="#" aria-current="page">Início</a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<main class="container my-4">
  <h1 class="display-5 mb-4">Listagem de Produtos</h1>
  <!-- Grid responsivo: 1 col (xs) → 2 col (sm) → 3 col (md) → 4 col (lg) -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
    <?php foreach ($listaProdutos as $prod): ?>
    <div class="col">
      <div class="card h-100">
        <a href="produto.php?id=<?php echo $prod['id']; ?>">
          <img class="card-img-top" src="img/<?php echo $prod['foto']; ?>" alt="<?php echo $prod['nome']; ?>">
        </a>
        <div class="card-body d-flex flex-column">
          <h5 class="card-title"><?php echo $prod['nome']; ?></h5>
          <p class="card-text text-truncate"><?php echo $prod['descricao']; ?></p>
          <a href="produto.php?id=<?php echo $prod['id']; ?>" class="btn btn-primary mt-auto">Mais detalhes...</a>
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
</main>
        

<div class="container">
  <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
    <div class="col-md-4 d-flex align-items-center">
      <a href="/" class="mb-3 me-2 mb-md-0 text-muted text-decoration-none lh-1">
        <svg class="bi" width="30" height="24"><use xlink:href="#bootstrap"/></svg>
      </a>
      <span class="text-muted">&copy; 2029 Senacão Show</span>
    </div>

    <ul class="nav col-md-4 justify-content-end list-unstyled d-flex">
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#twitter"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#instagram"/></svg></a></li>
      <li class="ms-3"><a class="text-muted" href="#"><svg class="bi" width="24" height="24"><use xlink:href="#facebook"/></svg></a></li>
    </ul>
  </footer>
</div>



  <!-- Bootstrap JavaScript Libraries -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
</body>

</html>