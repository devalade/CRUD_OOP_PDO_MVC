<?php 
session_start();
$visiter = new VisiterController();
$moment = new MomentController();
$musees = new MuseeController();

  

  if(isset($_POST['ajouter'])){
    $nbvisiteurs = htmlentities($_POST['nbvisiteurs']);
    $num_mus = htmlentities($_POST['numMus']);
    $jour = htmlentities($_POST['jour']);

    $visiter->addVisiter($num_mus,$jour,$nbvisiteurs);

    $_SESSION['message'] = "<div class='alert alert-success mt-5' role='alert'>
                    success
                  </div>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

  }

  if(isset($_POST['update'])) {
    $nbvisiteurs = htmlentities($_POST['nbvisiteurs']);
    $num_mus = htmlentities($_POST['numMus']);
    $jour = htmlentities($_POST['jour']);

    $mus = htmlentities($_POST['numMus']);
    $jour = htmlentities($_POST['jour']);

    $visiter->updateVisiter($num_mus,$jour,$nbvisiteurs, $mus, $ment);
    
    $_SESSION['message'] = `<div class="alert alert-success mt-5" role="alert">
                Donnees modifies avec  Success
              </div>`;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  if(isset($_GET['numMus']) and isset($_GET['jour'])) {
        $num_mus = htmlentities($_GET['numMus']);
        $jour = htmlentities($_GET['jour']);

        $visiter->delVisiter($num_mus, $jour);
        
        $_SESSION['message'] = "<div class='alert alert-danger mt-5' role='alert'>
                     Element is deleted successfully
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
            <h5 class="modal-title" id="staticBackdropLabel">Musee</h5>
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
                    <label for="nbvisiteurs">Nombre de visiteurs</label>
                    <input type="text" class="col-md-12 p-2 form-control" name="nbvisiteurs" id="nbvisiteurs" class="p-2" required>
                </div>
                <div class="form-group">
                    <label for="jour">Jour</label>
                            <select class="custom-select" name="jour" id="jour" class="p-1">                        
                        <?php foreach ($moment->getMoment() as $m): ?>
                            <option name="jour" value="<?= $m['jour']?>"><?= $m['jour']?></option>
                        <?php endforeach ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="numMus">Numéro du Musée</label>
                            <select class="custom-select" name="numMus" id="numMus" class="p-1">                        
                        <?php foreach ($musees->getMusee() as $m): ?>
                            <option value="<?= $m['numMus']?>"><?= $m['numMus']?></option>
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
        <h1 class="h2">Musee</h1>
       
      </div>


      <!-- <h2>Bibliotheque</h2> -->
      
      <div class="table-responsive col-10 mx-auto">
        <table class="table ">
          <thead>
            <tr>
                <th>#</th>
                <th>Numero de Musée</th>
                <th>Jour</th>
                <th>Nombre de visiteur</th>
                <th colspan=2 >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($musees->getMusee() as $key => $data ): ?>
            <tr>
                <td><?= $key +1 ?></td>
                <td><?= $data["nomMus"] ?></td>
                <td><?= $data["nblivres"] ?></td>
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
                                    <input name="" type="hidden" class="form-control" placeholder="code pays">                    
                                </div>

                                <div class="form-group">
                                    <label for="nbvisiteurs">Nombre de visiteurs</label>
                                    <input <?= $data["nbvisiteurs"] ?> type="text" class="col-md-12 p-2 form-control" name="nbvisiteurs" id="nbvisiteurs" class="p-2" required>
                                </div>
                                <div class="form-group">
                                    <label for="jour">Jour</label>
                                            <select class="custom-select" name="jour" id="jour" class="p-1">                        
                                        <?php foreach ($moment->getMoment() as $m): ?>
                                            <option <?php if($data['numMus'] == $p['numMus']){?> selected <?php } ?> name="jour" value="<?= $m['jour']?>"><?= $m['jour']?></option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="numMus">Numéro du Musée</label>
                                            <select class="custom-select" name="numMus" id="numMus" class="p-1">                        
                                        <?php foreach ($musees->getMusee() as $m): ?>
                                            <option value="<?= $m['numMus']?>"><?= $m['numMus'] ?></option>
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
                </td>
                <td>
                  <!-- <form action="" method="POST"> -->
                      <a name="delete" type="submit" class="btn btn-primary" href="index.php?page=musee&numMus=<?= $data["numMus"] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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