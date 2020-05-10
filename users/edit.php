<?php
include '../database.php';
$id=$_GET['id'];
$sql='SELECT * FROM users where id=?';
$statement=$pdo->prepare($sql);
$statement->bindValue(1,$id);
$statement->execute();
$user=$statement->fetch(PDO::FETCH_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <title>Document</title>
</head>
<body>


<div class="container">
    <h2>Edits</h2>
    <form class="form-horizontal" action="store.php" method="post" enctype="multipart/form-data">
        <div class="form-group">
            <label class="control-label col-sm-2" for="name">Name</label>
            <div class="col-sm-10">
                <input type="name" class="form-control" id="name" placeholder="" name="name" value="<?=$user['name']?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" placeholder="" name="email" value="<?=$user['email']?>">
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" for="pwd">Password</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="password" placeholder="" name="password" value="<?=$user['password']?>"">
            </div>
        </div>

    <div class="form-group">
        <input type="file" class="form-control-file border" name="image" >
    </div>

        <div class="form-group">
            <img src="../uploads/<?=$user['image'];?>" width="200px">
        </div>

        <input type="hidden" name="id" value="<?=$user['id'];?>">

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-success">Изменить</button>

            </div>
        </div>


    </form>





</div>

</body>
</html>