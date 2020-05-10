<?php
require '../database.php';
$id=$_GET['id'];
$sql='SELECT * FROM users WHERE id=?';
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();
$user=$statement->fetch(PDO::FETCH_ASSOC);

//var_dump($user);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="media border p-3">
    <img src="../uploads/<?=$user['image']?>" alt="John Doe" class="mr-3 mt-3 rounded-circle" style="width:60px;">
    <div class="media-body">
        <h4><?=$user['name']?> <small><i>php crud system </i></small></h4>

    </div>
</div>
</body>
</html>


