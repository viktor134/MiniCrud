<?php
require '../database.php';


$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password = md5($password);

$sql = "UPDATE users SET  name=?,email=?,password=? WHERE id=?";
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $name);
$statement->bindValue(2, $email);
$statement->bindValue(3, $password);
$statement->bindValue(4, $id);
$statement->execute();


if (is_uploaded_file($_FILES['image']['tmp_name'])) {
    $image = $_FILES['image']['name'];

    $sql = 'SELECT * FROM users where id=?';
    $statement = $pdo->prepare($sql);
    $statement->bindValue(1, $id);
    $statement->execute();
    $images = $statement->fetch(PDO::FETCH_ASSOC);

    if (is_file('../uploads/' . $images['image'])) {
        unlink('../uploads/' . $images['image']);
    }


    move_uploaded_file($_FILES['image']['tmp_name'], '../uploads/' . $image);
}
$sql = 'UPDATE users SET image=? where id=?';
$statement = $pdo->prepare($sql);
$statement->bindValue(1, $image);
$statement->bindValue(2, $id);
$statement->execute();


header('Location:../index.php');


