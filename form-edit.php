<?php
  require_once __DIR__ . "/includes/redirect.php";
  redirect();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin To-do list</title>
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link href="css/style.css" rel="stylesheet">
</head>

<body>
  <div id="container">
    
    <?php include_once __DIR__  . "/modules/header.php" ?>
    
    <?php include_once __DIR__  . "/modules/nav_menu.php" ?>
    
    <!--main content start-->
    <main id="main-content">
      <div class="wrapper">
        <h3><i class="fa fa-angle-right"></i> To-Do List</h3>
        <div class="row mt">
          <div class="col-md-12">
            <section class="task-panel tasks-widget">
              <div class="panel-heading">
                <div class="pull-left">
                  <h5><i class="fa fa-tasks"></i> Ajouter une tâche</h5>
                </div>
                <br>
              </div>
              <div class="panel-body">
                <div class="task-content">
                  
                <!-- Début du formulaire d'ajout de todo -->              
                <form class="form-horizontal style-form" method="POST" action="/traitement-form-add.php">
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label" for="inputTitle">Titre de la tâche</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="inputTitle" name="title">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="col-sm-2 col-sm-2 control-label" for="inputContent">Description complète de la tâche</label>
                      <div class="col-sm-10">
                        <textarea class="form-control" id="inputContent" name="desc"></textarea>
                      </div>
                    </div>
                    <div class="pull-right">
                      <button type="submit" class="btn btn-primary">Enregistrer</button>
                    </div>
                  </form>
                <!-- Fin du formulaire d'ajout de todo -->   
                
                </div>
              </div>
            </section>
          </div>
        </div>
        
      </div>
    </main>

    <?php include_once __DIR__  . "/modules/footer.php" ?>

  </div>
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="lib/common-scripts.js"></script>  
  
</body>

</html>
