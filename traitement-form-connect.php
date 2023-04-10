<?php
session_start();

if (!empty($_POST['name']) && !empty($_POST['password'])) {

    $identity = strtolower(trim(htmlentities($_POST['name'])));
    $password = $_POST['password'];
    
    $conn;
    try {
        $conn = new PDO('sqlite:database.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        die();
    }

    $sql = "SELECT * FROM users WHERE LOWER(name)= ? AND password= ?"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute([$identity, $password]);

    $result = $stmt->fetch();

    if ($result) {
        $_SESSION['user'] = $result;
        $_SESSION['connected'] = true;
        header('Location: /index.php');
        die();
    } else {
        header('Location: /login.php');
        die();
    }
}

header('Location: /login.php');