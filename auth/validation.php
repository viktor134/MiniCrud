<?php
session_start();
  include '../database.php';


      $email = $_POST['email'];
      $password = md5($_POST['password']);
      //пароль должен быть захеширован чтобы сотвесвовал значение из базы
if(isset($_POST['email']))
{
    if(empty($email) || empty($password))
    {
        $message='<label>All fields are required</label>';
    }
    else
    {
        $query="SELECT * FROM users WHERE email= :email and password=:password";
        $statement=$pdo->prepare($query);
        $statement->execute(
            [
                 'email'=>$email,
                 'password'=>$password
            ]
        );
        $count=$statement->rowCount();
        if($count>0)
        {
            $count=$statement->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username']=[
                'name'=>$count['name']
            ];
            header('Location:../index.php');
        }
        elseif($count->id==0)
        {
            echo "Ошибка пользовател не найден";
        }



    }
}







