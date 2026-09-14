<?php 
require 'conexao.php';
?>

<!doctype html>
<html lang="pt_BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr" crossorigin="anonymous">
  </head>
  <body>
    <?php include('navbar.php'); ?>
      <div class="container mt-5">
        <div class="row">
         <div class="col-md-12">
              <div class="card">
                   <div class="card-header">
                        <h4>Adicionar Admin
                         <a href="../index.html" class="btn btn-danger float end">Voltar</a>
                      </h4>
                  </div>
                  <div class="card-body">
                    <form action="administrador.php?funcao=cadastrar" method="POST">
                        <div class="mb-3">
                            <label>Id</label>
                                <input type="number" name="id_admin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Nome</label>
                                <input type="text" name="nome_admin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Email</label>
                                <input type="text" name="email_admin" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label>Senha</label>
                                <input type="password" name="senha" class="form-control">
                        </div>
                        <div class="mb-3">
                                <button type="submit" name="create-admin" class="btn btn-primary">Cadastrar</button>
                        </div>
                    </form>
                  </div>
             </div>
         </div>
     </div> 
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" integrity="sha384-ndDqU0Gzau9qJ1lfW4pNLlhNTkCfHzAVBReH9diLvGRem5+R9g2FzA8ZGN954O5Q" crossorigin="anonymous"></script>
  </body>
</html>