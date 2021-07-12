<?php 
session_start();

  if(isset($_POST['ajouter'])) {
        $code_pays = htmlentities($_POST['code_pays']);
        $nbhabitant = htmlentities($_POST['nbhabitant']);

        $pays = new PaysController();
        $pays->addPays($code_pays, $nbhabitant);
        
        $_SESSION['message'] = `<div class="alert alert-success mt-5" role="alert">
                    Success
                  </div>`;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  if(isset($_POST['update'])){
     $code_pays = htmlentities($_POST['code_pays']);
    $nbhabitant = htmlentities($_POST['nbhabitant']);

    $pays = new PaysController();
    $pays->updatePays($code_pays, $code_pays, $nbhabitant);

    $_SESSION['message'] = "<div class='alert alert-success mt-5' role='alert'>
                    Donnees modifies avec success
                  </div>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

  }

  if(isset($_GET['codePays'])) {
        $code_pays = htmlentities($_GET['codePays']);
        echo ($code_pays);
        $pays = new PaysController();
        $pays->delPays($code_pays);
        
        $_SESSION['message'] = "<div class='alert alert-danger mt-5' role='alert'>
                    Utilisateur supprimer avec success
                  </div>";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
?>



    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-md-4">
    <!-- modal  -->

    <?php  
      if(isset($_SESSION['message'])){
        echo $_SESSION['message']; // display the message
        
      }
    ?> 
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#staticBackdrop">
    Ajouter
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Pays</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">

            <form method="POST" action="">

                <div class="form-group hidden">
                    <input name="" type="hidden" class="form-control" placeholder="code pays">
                    
                </div>

                <div class="form-group">
                    <label for="exampleInputEmail1">Code Pays</label>
                    <input name="code_pays" type="text" class="form-control" placeholder="code pays">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>

                <div class="form-group">
                    <label for="exampleInputPassword1">Nombre d'habitant</label>
                    <input name="nbhabitant" type="text" class="form-control" placeholder="nombre d'habitant">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                    <button name="ajouter" type="submit" class="btn btn-primary">Ajouter</button>
                </div>

            </form>
        </div>
        
        </div>
    </div>
    </div>

      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-5 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pays</h1>
       
      </div>


      <!-- <h2>Pays</h2> -->
      <?php 
        $pays = new PaysController();
      ?>
      <div class="table-responsive col-10 mx-auto">
        <table class="table ">
          <thead>
            <tr>
              <th>#</th>
              <th>Code Pays</th>
              <th>Nombre d'habitant</th>
              <th colspan
              =2 >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($pays->getPays() as $key => $data ): ?>
            <tr>
                <td><?= $key +1 ?></td>
                <td><?= $data["codePays"] ?></td>
                <td><?= $data["nbhabitant"] ?></td>
                <td>
                    
                     <!-- Button EDIT modal -->
                      <button type="button" class="btn  btn-success" data-toggle="modal" data-target="#exampleModal_<?= $key ?>" >
                        <i class="fa fa-pencil" aria-hidden="true"></i>
                      </button>

                  <div class=" modal fade" id="exampleModal_<?= $key ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel">Modifier</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" action="">

                              <div class="form-group hidden">
                                  <input name="" type="hidden" class="form-control" placeholder="code pays">
                                  
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputEmail1">Code Pays</label>
                                  <input name="code_pays" type="text" class="form-control" placeholder="code pays" value="<?= $data["codePays"] ?>">
                                  
                              </div>

                              <div class="form-group">
                                  <label for="exampleInputPassword1">Nombre d'habitant</label>
                                  <input name="nbhabitant" type="text" class="form-control" placeholder="nombre d'habitant" value="<?= $data["nbhabitant"] ?>">
                              </div>
                              <div class="modal-footer">
                                  <button  type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                                  <button name="update" type="submit" class="btn btn-primary">Modifier</button>
                              </div>

                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </td>
                <td>
                  <!-- <form action="" method="POST"> -->
                      <a name="delete" type="submit" class="btn btn-primary" href="index.php?page=pays&codePays=<?= $data['codePays'] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                  <!-- </form> -->
                </td>
            </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>

<?php 
    // unset($_SESSION['message']);
?>