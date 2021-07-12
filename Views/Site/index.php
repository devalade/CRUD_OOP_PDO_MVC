<?php 
session_start();
$pays = new PaysController();
$site = new SiteController();

  

  if(isset($_POST['ajouter'])){
    $nom_site = htmlentities($_POST['nomSite']);
    $anneedecouv = htmlentities($_POST['anneedecouv']);
    $code_pays = htmlentities($_POST['codePays']);

    $site->addSite($nom_site,$anneedecouv,$code_pays );

    $_SESSION['message'] = "<div class='alert alert-success mt-5' role='alert'>
                    success
                  </div>";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    

  }

  if(isset($_POST['update'])) {
    $id = htmlentities($_POST['_nomSite']);
    $nom_site = htmlentities($_POST['nomSite']);
    $anneedecouv = htmlentities($_POST['anneedecouv']);
    $code_pays = htmlentities($_POST['codePays']);

    $site->updateSite($id, $nom_site,$anneedecouv,$codePays);
    
    $_SESSION['message'] = `<div class="alert alert-success mt-5" role="alert">
                Donnees modifies avec  Success
              </div>`;

        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }

  if(isset($_GET['nomSite'])) {
        $nom_site = htmlentities($_GET['nomSite']);

        $site->delSite($nom_site);
        
        $_SESSION['message'] = "<div class='alert alert-danger mt-5' role='alert'>
                    Site supprimer avec success
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
                    <label for="nomSite">Nom du site</label>
                    <input type="text" class="col-md-12 p-2 form-control" name="nomSite" id="nomSite" class="p-2" required>
                </div>
                <div class="form-group">
                    <label for="anneedecouv">Année de découverte</label>
                    <input type="number" class="col-md-12 p-2 form-control" name="anneedecouv" id="anneedecouv" class="p-2" required>
                </div>
                <div class="form-group">
                    <label for="codePays">Code du Pays</label>
                            <select class="custom-select" name="codePays" id="codePays" class="p-1">                        
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
        <h1 class="h2">Musee</h1>
       
      </div>


      <!-- <h2>Bibliotheque</h2> -->
      
      <div class="table-responsive col-10 mx-auto">
        <table class="table ">
          <thead>
            <tr>
                <th>#</th>
                <th>Nom du site</th>
                <th>Année de decouverte</th>
                <th>Code Pays</th>
                <th colspan=2 >Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach($site->getSite() as $key => $data ): ?>
            <tr>
                <td><?= $key +1 ?></td>
                <td><?= $data["nomSite"] ?></td>
                <td><?= $data["anneedecouv"] ?></td>
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
                                    <input value="<?= $data["_nomSite"] ?>" name="nomSite" type="hidden" class="form-control" placeholder="">                    
                                </div>

                                 <div class="form-group">
                                    <label for="nomSite">Nom du site</label>
                                    <input value="<?= $data["nomSite"] ?>" type="text" class="col-md-12 p-2 form-control" name="nomSite" id="nomMus" class="p-2" required>
                                </div>
                                <div class="form-group">
                                    <label for="anneedecouv">Année de découverte</label>
                                    <input value="<?= $data["anneedecouv"] ?>" type="number" class="col-md-12 p-2 form-control" name="anneedecouv" id="anneedecouv" class="p-2" required>
                                </div>
                                <div class="form-group">
                                    <label for="codePays">Code du Pays</label>
                                            <select class="custom-select" name="codePays" id="codePays" class="p-1">                        
                                        <?php foreach ($pays->getPays() as $p): ?>
                                            <option <?php if($data['codePays'] == $p['codePays']){?> selected <?php } ?> value="<?= $p['codePays']?>"><?= $p['codePays']?></option>
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
                      <a name="delete" type="submit" class="btn btn-primary" href="index.php?page=site&nomSite=<?= $data["nomSite"] ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
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