<?php


    if(!isset($_COOKIE["user"]) or $_COOKIE["user"] != "token") {
        header("Location: /resumeapp/login");
        exit;
    }
    mysql_connect("localhost", "root", "");
    $email= $_COOKIE['user'];
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $descr= $_POST['description'];
    $contact= $_POST['contact'];
    $query= "INSERT INTO personal VALUES('$email', '$fname', '$lname', '$descr', '$contact')";


    
     

?>