<? /*1Реализовать  авторизацию +
   2 вывести ползователей +
   3 удаление изменеие пользователь+
   4  изменеие пользовательа функцияа добавки аватара+
  5  отправить проект на github

 */
session_start();
require_once 'users/user_get.php'
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<header>
    <div class="collapse bg-dark" id="navbarHeader">
        <div class="container">
            <div class="row">
                <div class="col-sm-8 col-md-7 py-4">
                    <h4 class="text-white">About</h4>
                    <p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>
                </div>
                <div class="col-sm-4 offset-md-1 py-4">
                    <h4 class="text-white">Contact</h4>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-white">Follow on Twitter</a></li>
                        <li><a href="#" class="text-white">Like on Facebook</a></li>
                        <li><a href="#" class="text-white">Email me</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="navbar navbar-dark bg-dark shadow-sm">
        <div class="container d-flex justify-content-between">
            <a href="#" class="navbar-brand d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" aria-hidden="true" class="mr-2" viewBox="0 0 24 24" focusable="false"><path d="M23 19a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V8a2 2 0 0 1 2-2h4l2-3h6l2 3h4a2 2 0 0 1 2 2z"></path><circle cx="12" cy="13" r="4"></circle></svg>
                <strong>VIKTOR</strong>
            </a>
            <a href="auth/register.php" class="btn btn-success" type="button">

                <?
                if(isset($_SESSION['username']))
                {
                    echo  $_SESSION["username"]['name'];
                   echo "<a href='auth/logout.php' class='btn btn-success' type='button'>выход</a>";
                    

                }else
                   echo 'ВХОД/РЕГИСТРАЦИЯ'
                ?>
            </a>

        </div>
    </div>
    <div class="container d-flex justify-content-between">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</header>
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1>Система регистрации и авторизации</h1>
            <p class="lead text-muted">Система регистрации и авторизации на процедурном  php 7.3 + CRUD</p>

        </div>
    </section>

    <div class="album py-5 bg-light">
        <div class="container">

            <div class="row">
                <?foreach ($users as $user):?>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <img src="../uploads/<?=$user['image']?>" width="300px">
                        <div class="card-body">
                            <p class="card-text"><?=$user['name']?></p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <a href="users/views.php?id=<?=$user['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">View</button></a>
                                    <a href="users/edit.php?id=<?=$user['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">Edit</button></a>
                                    <a href="users/delete.php?id=<?=$user['id']?>"><button type="button" class="btn btn-sm btn-outline-secondary">Delete</button></a>
                                </div>
                                <small class="text-muted">9 mins</small>
                            </div>
                        </div>
                    </div>
                </div>
       <?endforeach;?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>
</body>
</html>
