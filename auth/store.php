<?php
include '../database.php';


    $name=$_POST['name'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $password=md5($password);



$sql="INSERT INTO users(name,email,password) values (:name,:email,:password)";
$statement=$pdo->prepare($sql);
$statement->execute([
    'name'=>$name,
    'email'=>$email,
    'password'=>$password
]);

header('Location:../index.php');
//var_dump($statement);