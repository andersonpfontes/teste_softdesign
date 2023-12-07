<div class="container">
  <div class="row">
    <div class="col-md-12 mt-5 pt-3 pb-3 bg-white from-wrapper">
      <div class="container">
        <h3>Cadastro de Livros</h3>
        <hr>
        <form class="" action="<?php echo base_url(); ?>/books" method="post">
          <div class="row">
            <div class="col-12 col-sm-12">
              <div class="form-group">
               <label for="title">Título</label>
               <input type="text" class="form-control" name="title" id="title" value="">
              </div>
            </div>
            <div class="col-12 col-sm-12">
              <div class="form-group">
               <label for="description">Descrição</label>
                  <textarea rows="5" class="form-control" name="description" id="description" value="" ></textarea>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
               <label for="author">Autor</label>
               <input type="text" class="form-control" name="author" id="author" value="">
              </div>
            </div>
            <div class="col-6 col-sm-6">
              <div class="form-group">
               <label for="number_pages">Número de páginas</label>
               <input type="number" class="form-control" name="number_pages" id="number_pages" value="">
             </div>
           </div>
          <?php if (isset($validation)): ?>
            <div class="col-12">
              <div class="alert alert-danger" role="alert">
                <?= $validation->listErrors() ?>
              </div>
            </div>
          <?php endif; ?>
          </div>

          <div class="row">
            <div class="col-12 col-sm-4">
              <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
    <hr>
    <div class="row">
        <div class="col-md-12">
            <div class="row py-5">
                <div class="col-12">
                    <table id="table_books" class="table table-hover responsive nowrap" style="width:100%">
                        <thead>
                        <tr>
                            <th>Título/Autor</th>
                            <th>Descrição</th>
                            <th>Numero de páginas</th>
                            <th>Criado em</th>
                            <th>Ação</th>
                        </tr>
                        </thead>
                        <tbody>
                        <pre>
                        <?php foreach($books as $book): ?>
                            <tr>
                                <td>
                                    <a href="#">
                                        <div class="d-flex align-items-center">
                                            <div class="avatar avatar-blue mr-3">1</div>

                                            <div class="">
                                                <p class="font-weight-bold mb-0"><?php echo $book['title']; ?></p>
                                                <p class="text-muted mb-0"><?php echo $book['author']; ?></p>
                                            </div>
                                        </div>
                                    </a>
                                </td>
                                <td><?php echo $book['description']; ?>...</td>
                                <td><?php echo $book['number_pages']; ?></td>
                                <td><?php echo $book['created_at']; ?></td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-sm btn-icon" type="button" id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-horizontal-rounded" data-toggle="tooltip" data-placement="top"
                                               title="Actions"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item" href="#"><i class="bx bxs-pencil mr-2"></i> Editar Livro</a>
                                            <a class="dropdown-item text-danger" href="#"><i class="bx bxs-trash mr-2"></i> Deletar</a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>
