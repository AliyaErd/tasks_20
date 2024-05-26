<?php
session_start();
If(isset($_POST['text'])) {
    $text=$_POST['text'];
    }
    $pdo = new PDO("mysql:host=localhost;dbname=tasks;", "root", "root");

    $sql = "SELECT * FROM task10 WHERE text= :text";
    $statement = $pdo -> prepare($sql);
    $statement -> execute(['text' => $text]);
    $task = $statement->fetch(PDO::FETCH_ASSOC);

if(!empty($task)) {
    $message = "Введенные данные уже присутствуют в таблице.";
    $_SESSION['$danger'] =$message;

    header('Location: task_11.php');
    exit;
}

    $sql = "INSERT INTO task10 (text) VALUES (:text)";
    $statement = $pdo->prepare($sql);
    $statement -> execute(['text' => $text]);
    $message = "Данные успешно добавлены";
    $_SESSION['$success'] =$message;

header('Location: task_11.php');
?>