<?php 
  mysql_connect("localhost","root","");
    mysql_select_db("iitu");


 if (!empty($_POST)){
        if(!empty($_POST['email'] && !empty($_POST['message']))){
                
                $email = isset($_POST['email']) ? $_POST['email'] : '';
                $message = isset($_POST['message']) ? $_POST['message'] : '';

                mysql_query("INSERT INTO questions VALUES (NULL,'$email','$message')") or mysql_error();

        		header("Location: index.php?mess=Ваш вопрос отправлен. Ждите ответа. ");
        }else{
             header("Location: index.php?mess=Заполните поля");
        }
    
            }