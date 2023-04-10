<?php
session_start();

if (!empty($_POST['title']) && !empty($_POST['desc'])) {

    $title = trim(htmlentities($_POST['title']));
    $desc = trim($_POST['desc']); //Je laisse sans htmlentities pour des modifications graphiques de la description

    $conn;
    try {
        $conn = new PDO('sqlite:database.db');
        $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo 'Connexion échouée : ' . $e->getMessage();
        die();
    }

    $sql = "INSERT INTO todos VALUES(NULL, :idUser, :title, :content, 0)"; 
    $stmt = $conn->prepare($sql);
    $stmt->execute([
        "idUser" => $_SESSION['user']['id'],
        "title" => $title,
        "content" => $desc,
    ]);

    header('Location: /index.php');
    die();
}

header('Location: /form-edit.php');