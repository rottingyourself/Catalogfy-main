<?php
// Página inicial do site para listagem de produtos cadastrados.
require_once('admin/classes/Produto.class.php');
require_once('admin/classes/Categoria.class.php');
require_once('admin/classes/Banco.class.php');

$produto = new Produto();
$categoria = new Categoria();
$categorias = $categoria->Listar();

$busca = isset($_GET['busca']) ? $_GET['busca'] : '';
$id_categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';

if (!empty($busca) || !empty($id_categoria)) {
    $listaProdutos = $produto->Buscar($busca, $id_categoria);
} else {
    $listaProdutos = $produto->Listar();
}
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
  <h1 class="display-5 mb-4">
    <?php if (!empty($busca)): ?>
      Resultados para: <span class="text-primary"><?php echo htmlspecialchars($busca); ?></span>
    <?php else: ?>
      Listagem de Produtos
    <?php endif; ?>
  </h1>

  <!-- Formulário de busca -->
  <form method="GET" class="row g-3 mb-4" data-testid="form-busca">
    <div class="col-md-5">
      <input type="text" name="busca" class="form-control" placeholder="Buscar produto..."
        value="<?php echo htmlspecialchars($busca); ?>" data-testid="input-busca">
    </div>
    <div class="col-md-4">
      <select name="categoria" class="form-select" data-testid="select-categoria">
        <option value="">Todas as categorias</option>
        <?php foreach ($categorias as $cat): ?>
          <option value="<?php echo $cat['id']; ?>" <?php if ($id_categoria == $cat['id']) echo 'selected'; ?>>
            <?php echo htmlspecialchars($cat['nome']); ?>
          </option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="col-md-2">
      <button type="submit" class="btn btn-primary w-100" data-testid="botao-buscar">Buscar</button>
    </div>
  </form>

  <!-- Grid responsivo: 1 col (xs) → 2 col (sm) → 3 col (md) → 4 col (lg) -->
  <?php if (empty($listaProdutos)): ?>
    <p class="text-center text-muted" data-testid="mensagem-vazio">Nenhum produto encontrado</p>
  <?php else: ?>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">
      <?php foreach ($listaProdutos as $prod): ?>
      <div class="col">
        <div class="card h-100" data-testid="produto-card-<?php echo $prod['id']; ?>">
          <a href="produto.php?id=<?php echo $prod['id']; ?>">
            <img class="card-img-top" src="img/<?php echo $prod['foto']; ?>" alt="<?php echo $prod['nome']; ?>">
          </a>
          <div class="card-body d-flex flex-column">
            <h5 class="card-title" data-testid="produto-nome-<?php echo $prod['id']; ?>"><?php echo $prod['nome']; ?></h5>
            <p class="card-text text-truncate"><?php echo $prod['descricao']; ?></p>
            <p class="card-text" data-testid="produto-preco-<?php echo $prod['id']; ?>">R$ <?php echo number_format($prod['preco'], 2, ',', '.'); ?></p>
            <a href="produto.php?id=<?php echo $prod['id']; ?>" class="btn btn-primary mt-auto" data-testid="produto-detalhes-<?php echo $prod['id']; ?>">Mais detalhes...</a>
          </div>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  <?php endif; ?>
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