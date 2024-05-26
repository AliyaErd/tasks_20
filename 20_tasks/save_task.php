<?php

If(isset($_POST['text'])) {
    $text=$_POST['text'];
    }
    $pdo = new PDO("mysql:host=localhost;dbname=tasks;", "root", "root");
    $sql = "INSERT INTO task10 (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement -> execute(['text' => $text]);

header('Location: task_10.php');
?>