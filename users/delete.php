<?php

$id=$_GET['id'];
include '../database.php';
$sql='SELECT * FROM users where id=?';

$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();
$images=$statement->fetch(PDO::FETCH_ASSOC);

if(is_file('../uploads/' .$images['image']))
{
    unlink('../uploads/' . $images['image']);
}

$sql="Delete from users WHERE id=?";
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();

header('Location:../index.php');

