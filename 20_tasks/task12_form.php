<?php
session_start();

$email = $_POST['email'];
$password = $_POST['password'];

$pdo = new PDO("mysql:host=localhost;dbname=tasks;", "root", "root");
$sql ="SELECT * FROM task12 WHERE email=:email";
$statement = $pdo->prepare($sql);
$statement->execute(['email'=>$email]);
$user = $statement->fetch(mode:PDO::FETCH_ASSOC);

if(!empty($user)){
    //Сформировать флеш сообщение
$_SESSION['error'] = "Этот email уже занят другим пользователем";
header(header:"location:task_12.php");
exit;
}



$hashed_password = password_hash($password, algo:PASSWORD_DEFAULT);

$sql = "INSERT INTO task12 (email,password) VALUES (:email, :password)";
$statement = $pdo->prepare($sql);
$statement->execute(['email' => $email, 'password' => $hashed_password]);
?>