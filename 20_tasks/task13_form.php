<?php
session_start();

$text = '';

if (empty($_POST['text'])) {
    $text = $_POST['text'];
} else {
    $text = 'Ваше сообщение выводится тут';  
}

$_SESSION['text'] = $text;

redirect();


function redirect() 
{
    header('Location: task_13.php');
    exit;
}
