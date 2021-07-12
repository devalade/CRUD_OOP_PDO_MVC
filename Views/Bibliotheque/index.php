<?php 
session_start();
$bibliotheque = new BibliothequeController();
$ouvrages = new OuvrageController();
$musees = new MuseeController();

  

  if(isset($_POST['ajouter'])){
    $ISBN = htmlentities($_POST['ISBN']);
    $num_mus = htmlentities($_POST['numMus']);
    $date_achat = htmlentities($_POST['dateAchat']);

    $bibliotheque->addBibliotheque(  $num_mus, $ISBN, $date_achat );

    $_SESSION['message'] = "<div class='alert alert-success mt-5' role='alert'>
                    success
                  </div>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

  }

  if(isset($_POST['update'])) {
    $musee = htmlentities($_POST['_numMus']);
    $ISBN = htmlentities($_POST['ISBN']);
    $num_mus = htmlentities($_POST['numMus']);
    $ouvrage = htmlentities($_POST['_ISBN']);
    $date_achat = htmlentities($_POST['dateAchat']);

    $bibliotheque->updateBibliotheque($musee, $ouvrage, $num_mus, $ISBN, $date_achat);
    
    $_SESSION['message'] = `<div class="alert alert-success mt-5" role="alert">
                Donnees modifies avec  Success
              </div>`;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  if(isset($_GET['ISBN']) && isset($_GET['numMus'])) {
        $ISBN = htmlentities($_GET['ISBN']);
        $num_mus = htmlentities($_GET['numMus']);

        $bibliotheque->delBibliotheque($num_mus, $ISBN);
        
        $_SESSION['message'] = "<div class='alert alert-danger mt-5' role='alert'>
                    Bibliotheque supprimer avec success
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
                    <label for="exampleInputEmail1">ISBN</label>
                    <select class="custom-select" name="ISBN" id="ISBN" class="p-1">
                        <?php foreach($ouvrages->getOuvrage() as $ouvrage): ?>
                            <option value="<?= $ouvrage['ISBN'] ?> "> <?= $ouvrage['ISBN']?> </option>
                         <?php endforeach ?>   
                    </select>
                </div>

                <div class="form-group">
                    <label for="nbhabitant">Numéro du Musée</label>
                            <select class="custom-select" name="numMus" id="numMus" class="p-1">
                        
                        <?php foreach ($musees->getMusee() as $musee): ?>
                            <option value="<?= $musee['numMus']?>"><?= $musee['numMus']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="dateAchat">Date d'achat</label>
                    <input type="date" class="col-md-12 p-2 form-control" name="dateAchat" id="dateAchat" class="p-2" required>
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
                <th>Numéro du Musée</th>
                <th>ISBN</th>
                <th>Date d'achat</th>
                <th colspan=2 >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($bibliotheque->getBibliotheque() as $key => $data ): ?>
            <tr>
                <td><?= $key +1 ?></td>
                <td><?= $data["numMus"] ?></td>
                <td><?= $data["ISBN"] ?></td>
                <td><?= $data["dateAchat"] ?></td>
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
                            <div class="form-group">
                                <input name="_numMus" type="hidden"  value="<?= $data['numMus'] ?>">
                            </div> <br>
                            <div class="form-group">
                                <input name="_ISBN" type="hidden" value="<?= $data['ISBN'] ?>">
                            </div>
                            <div class="form-group hidden">
                              <input name="" type="hidden" class="form-control" placeholder="">
                            </div>

                          <div class="form-group">
                              <label for="exampleInputEmail1">ISBN</label>
                              <select class="custom-select" name="ISBN" id="ISBN" class="p-1">
                                  <?php foreach($ouvrages->getOuvrage() as $ouvrage): ?>
                                      <option <?php if(strtolower($data['ISBN']) === strtolower($ouvrage['ISBN'])){?> selected <?php } ?> value="<?= $ouvrage['ISBN'] ?>"> <?= $ouvrage['ISBN']?> </option>
                                  <?php endforeach ?>   
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="nbhabitant">Numéro du Musée</label>
                                <select class="custom-select" name="numMus" id="numMus">
                                  
                                  <?php foreach ($musees->getMusee() as $musee): ?>
                                      <option <?php if($data['numMus'] === $musee['numMus']){?> selected <?php } ?> value="<?= $musee['numMus']?>"><?= $musee['numMus']?></option>
                                  <?php endforeach ?>
                                </select>
                          </div>
                          <div class="form-group">
                              <label for="dateAchat">Date d'achat</label>
                              <input type="date" class="col-md-12 p-2 form-control" name="dateAchat" id="dateAchat" class="p-2" value="<?= $data["dateAchat"] ?>" required>
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
                      <a name="delete" type="submit" class="btn btn-primary" href="index.php?page=bibliotheque&ISBN=<?= $data["ISBN"] ?>&numMus=<?= $data["numMus"] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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