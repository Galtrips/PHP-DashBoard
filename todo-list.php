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
                  <h5><i class="fa fa-tasks"></i> Liste des tâches a faire / faites</h5>
                </div>
                <br>
              </div>
              <div class="panel-body">
                <div class="task-content"><!-- ici on pourra afficher toutes les todo, et ne pas limiter seulement à 3 éléments -->
                  <ul class="task-list">
                  
                    <?php

                        $conn;
                        try {
                            $conn = new PDO('sqlite:database.db');
                            $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                        } catch (PDOException $e) {
                            echo 'Connexion échouée : ' . $e->getMessage();
                            die();
                        }

                        $sql = "SELECT * FROM todos WHERE user_id= ? ORDER BY id DESC"; 
                        $stmt = $conn->prepare($sql);
                        $stmt->execute([$_SESSION['user']['id']]);
                    
                        $result = $stmt->fetchAll();

                        foreach($result as $row) {

                          echo '<li class="tooltips" title="' . $row['content']. '">';
                            echo '<div class="task-title">';
                              echo '<span class="task-title-sp">' . $row['title'] . '</span>';
                              $value;
                              if ($row['done'] == true) { 
                                $value = "Fait"; 
                              } else { 
                                $value="Non-Fait"; 
                              }
                              echo '<span class="badge bg-theme">'. $value . '</span>';
                              echo '<div class="pull-right hidden-phone">';
                              echo '<a href="#" class="btn btn-success btn-xs"><i class=" fa fa-check"></i></a>';
                              echo '<a href="#" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i></a>';
                              echo '<a href="#" class="btn btn-danger btn-xs"><i class="fa fa-trash-o "></i></a>';
                              echo '</div>';
                            echo '</div>';
                          echo '</li>';
                        }
                      ?>
                   

                  </ul>
                </div>
                <div class=" add-task-row">
                  <a class="btn btn-success btn-sm pull-left" href="form-edit.php">Ajouter une nouvelle tâche</a>
                  <a class="btn btn-default btn-sm pull-right" href="todo-list.php">Voir toutes les tâches</a>
                </div>
              </div>
            </section>
          </div>
          <!-- /col-md-12-->
        </div>
        
      </div>
      <!-- /wrapper -->
    </main>
    <!--main content end-->

    <?php include_once __DIR__  . "/modules/footer.php" ?>

  </div>
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  
  <script src="lib/common-scripts.js"></script>  
  
</body>

</html>
