<?php
// Painel de administração
session_start();
// Verificar se a sessão NÃO existe:
if(!isset($_SESSION['dados'])){
  header('Location: index.php');
  exit();
}

require_once('classes/Categoria.class.php');
$c = new Categoria();
$categorias = $c->Listar();

require_once('classes/Produto.class.php');

$produto = new Produto();
$produtos = $produto->Listar();

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Listagem de Produtos</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        body {
            background: #f8f9fa;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Gerenciamento de Produtos</h1>
        <div class="row mb-3">
            <div class="col d-flex justify-content-end">
                <button type="button" class="btn btn-success mx-1" data-toggle="modal" data-target="#modalCadastro"><i class="bi bi-plus-circle"></i> Cadastrar Produto</button>
                <a class="btn btn-danger mx-1 text-white" href="sair.php"><i class="bi bi-box-arrow-right"></i> Sair</a>
            </div>
        </div>
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Foto</th>
                    <th>Nome</th>
                    <th>Descrição</th>
                    <th>Categoria</th>
                    <th>Estoque</th>
                    <th>Preço</th>
                    <th>Ação</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach($produtos as $produto){ 
                $nomeCategoria = '';
                foreach($categorias as $categoria){
                    if($categoria['id'] == $produto['id_categoria']){
                        $nomeCategoria = $categoria['nome'];
                        break;
                    }
                }
                $fotoProduto = $produto['foto'];
                if(empty($fotoProduto) || !file_exists('../img/'.$fotoProduto)){
                    $fotoProduto = 'semfoto.jpg';
                }
            ?>
            <tr>
                <td><?php echo $produto['id']; ?></td>
                <td><img src="../img/<?php echo $fotoProduto; ?>" alt="<?php echo $produto['nome']; ?>" width="100px"></td>
                <td><?php echo $produto['nome']; ?></td>
                <td><?php echo $produto['descricao']; ?></td>
                <td><?php echo $nomeCategoria; ?></td>
                <td><?php echo $produto['estoque']; ?></td>
                <td>R$ <?php echo number_format($produto['preco'], 2, ',', '.'); ?></td>
                <td>
                    <a href="editar.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                    <a href="#" class="btn btn-danger btn-sm" onclick="confirmarExclusao('excluir.php?id=<?php echo $produto['id']; ?>')">Excluir</a>
                </td>
            </tr>
<?php } ?>             
            </tbody>
        </table>

    </div>

    <!-- Modal de Cadastro -->
    <div class="modal fade" id="modalCadastro" tabindex="-1" role="dialog" aria-labelledby="modalCadastroLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
        <form action="action/cadastrar_produto.php" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalCadastroLabel">Cadastro de Produto</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                        <div class="form-group">
                            <label for="nomeProduto">Nome</label>
                            <input name="nome" type="text" class="form-control" id="nomeProduto" placeholder="Digite o nome do produto">
                        </div>
                        <div class="form-group">
                            <label for="fotoProduto">Foto</label>
                            <input name="foto" type="file" class="form-control-file" id="fotoProduto">
                        </div>
                        <div class="form-group">
                            <label for="descricaoProduto">Descrição</label>
                            <textarea name="descricao" class="form-control" id="descricaoProduto" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="categoriaProduto">Categoria</label>
                            <select class="form-control" id="categoriaProduto" name="id_categoria" >
'                                <?php foreach($categorias as $categoria){   ?>
                                      <option value="<?=$categoria['id'];?>"><?=$categoria['nome'];?></option>
                                      <?php } ?>'
                            <option value="1">Categoria 1</option>
                            </select> <br>
                            <div class="row">
                                <div class="col d-flex justify-content-end">
                                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalAddCategoria">Adicionar Categoria</button>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="estoqueProduto">Estoque</label>
                            <input name="estoque" type="number" class="form-control" id="estoqueProduto" placeholder="Digite a quantidade em estoque">
                        </div>
                        <div class="form-group">
                            <label for="precoProduto">Preço</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text">R$</span>
                                </div>
                                <input name="preco" type="number" class="form-control" id="precoProduto" placeholder="Digite o preço">
                            </div>
                        </div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
             </div>
        </form>
        </div>
    </div>
    <div class="modal fade" id="modalAddCategoria" tabindex="-1" role="dialog" aria-labelledby="modalAddCategoriaLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
            <form action="action/cadastrar_categoria.php" method="POST">    
                <div class="modal-header">
                    <h5 class="modal-title" id="modalAddCategoriaLabel">Adicionar Categoria</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                
                        <div class="form-group">
                            <label for="nomeCategoria">Nome da Categoria</label>
                            <input type="text" name="nome" class="form-control" id="nomeCategoria" placeholder="Digite o nome da categoria">
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Adicionar</button>    
                </div>
            </form>    
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <script>
      function confirmar(){
    alert('Você clicou em apagar.')
      }
 
   </script>

</body>

</html>