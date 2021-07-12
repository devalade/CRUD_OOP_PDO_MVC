<?php 
session_start();
$ouvrage = new OuvrageController();
$pays = new PaysController();

  

  if(isset($_POST['ajouter'])){
    $ISBN = htmlentities($_POST['ISBN']);
    $titre = htmlentities($_POST['titre']);
    $nbPage = htmlentities($_POST['nbPage']);
    $code_pays = htmlentities($_POST['codePays']);

    $ouvrage->addOuvrage($ISBN,$titre,$nbPage,$code_pays );

    $_SESSION['message'] = "<div class='alert alert-success mt-5' role='alert'>
                    success
                  </div>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

  }

  if(isset($_POST['update'])) {
      $_ISBN = htmlentities($_POST['_ISBN']);
    $ISBN = htmlentities($_POST['ISBN']);
    $titre = htmlentities($_POST['titre']);
    $nbPage = htmlentities($_POST['nbPage']);
    $code_pays = htmlentities($_POST['codePays']);

    $ouvrage->updateOuvrage($id, $ISBN,$titre,$nbPage,$code_pays);
    
    $_SESSION['message'] = `<div class="alert alert-success mt-5" role="alert">
                Donnees modifies avec  Success
              </div>`;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  if(isset($_GET['ISBN'])) {
        $ISBN = htmlentities($_GET['ISBN']);

        $ouvrage->delOuvrage($ISBN);
        
        $_SESSION['message'] = "<div class='alert alert-danger mt-5' role='alert'>
                    Ouvrage supprimer avec success
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
      <!-- Button Ajout modal -->
    <button type="button" class="btn btn-primary mt-5" data-toggle="modal" data-target="#staticBackdrop">
    Ajouter
    </button>

    <!-- Modal -->
    <div class="modal fade" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="staticBackdropLabel">Bibliotheque</h5>
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
                    <label for="ISBN">ISBN</label>
                    <input type="text" class="col-md-12 p-2 form-control" name="ISBN" id="ISBN" class="p-2" required>
                </div>

                <div class="form-group">
                    <label for="dateAchat">Titre</label>
                    <input type="text" class="col-md-12 p-2 form-control" name="titre" id="titre" class="p-2" required>
                </div>
                <div class="form-group">
                    <label for="nbPage">Nombre de Page</label>
                    <input type="number" class="col-md-12 p-2 form-control" name="nbPage" id="nbPage" class="p-2" required>
                </div>
                <div class="form-group">
                    <label for="nbhabitant">Pays</label>
                    <select class="custom-select" name="codePays" id="codePays">
                        
                        <?php foreach ($pays->getPays() as $p): ?>
                            <option value="<?= $p['codePays']?>"><?= $p['codePays']?></option>
                        <?php endforeach ?>
                    </select>
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
        <h1 class="h2">Bibliotheque</h1>
       
      </div>


      <!-- <h2>Bibliotheque</h2> -->
      
      <div class="table-responsive col-10 mx-auto">
        <table class="table ">
          <thead>
            <tr>
                <th>#</th>
                <th>ISBN</th>
                <th>Titre Ouvrage</th>
                <th>Nombre de Pages</th>
                <th>Code du Pays</th>
                <th colspan=2 >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($ouvrage->getOuvrage() as $key => $data ): ?>
            <tr>
                <td><?= $key +1 ?></td>
                <td><?= $data["ISBN"] ?></td>
                <td><?= $data["titre"] ?></td>
                <td><?= $data["nbPage"] ?></td>
                <td><?= $data["codePays"] ?></td>
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
                                    <input value="<?= $data["ISBN"] ?>" name="_ISBN" type="hidden" class="form-control" placeholder="">                    
                                </div>

                                <div class="form-group">
                                    <label for="ISBN">ISBN</label>
                                    <input value="<?= $data["ISBN"] ?>" type="text" class="col-md-12 p-2 form-control" name="ISBN" id="ISBN" class="p-2" required>
                                </div>

                                <div class="form-group">
                                    <label for="titre">Titre</label>
                                    <input value="<?= $data["titre"] ?>" type="text" class="col-md-12 p-2 form-control" name="titre" id="titre" class="p-2" required>
                                </div>
                                <div class="form-group">
                                    <label for="nbPage">Nombre de Page</label>
                                    <input value="<?= $data["nbPage"] ?>" type="number" class="col-md-12 p-2 form-control" name="nbPage" id="nbPage" class="p-2" required>
                                </div>
                                <div class="form-group">
                                    <label for="numMus">Pays</label>
                                    <select class="custom-select" name="codePays" id="codePays">
                                        <?php foreach ($pays->getPays() as $p): ?>
                                            <option <?php if($data['codePays'] === $p['codePays']){?> selected <?php } ?> value="<?= $p['codePays']?>"><?= $p['codePays']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
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
                      <a name="delete" type="submit" class="btn btn-primary" href="index.php?page=ouvrage&ISBN=<?= $data["ISBN"] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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

?>