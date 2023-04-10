<?php

function redirect() : void {
    session_start();

    if (empty($_SESSION['user']) && empty($_SESSION['connected'])) {
        header('Location: /login.php');
    }
}