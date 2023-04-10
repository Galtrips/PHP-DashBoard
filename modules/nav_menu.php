<?php
    session_start();
?>
<aside>
    <div id="sidebar" class="nav-collapse ">
        <ul class="sidebar-menu" id="nav-accordion">
            <p class="centered">
                <a href="#"><img src="img/users/<?= $_SESSION['user']['id']?>.jpg" class="img-circle" width="80"></a> <!-- utilisateur avec id = 1 donc son avatar est 1.jpg / id = 2 avatar est 2.jpg -->
            </p>
            <h5 class="centered"><?= $_SESSION['user']['name']; ?></h5><!-- à cette ligne on mettra le nom de la personne connecté -->
            <li class="mt">
                <a href="index.php">
                    <i class="fa fa-dashboard"></i>
                    <span>Tableau de bord</span>
                </a>
            </li>
            <li class="mt">
                <a href="todo-list.php">
                    <i class="fa fa-list"></i>
                    <span>Ma Todo Liste</span>
                </a>
            </li>
        </ul>
    </div>
</aside>