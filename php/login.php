<?php

   
    
    header('Content-Type: application/json');
    
    // Create connection
    $conn = new mysqli("localhost", "root", "", "resumeapp");
    
    if ($conn->connect_error) {
        $resp = array("success" => false, "message" => "db connection error!");
    }else {
        $query = "select * from user_auth where email='"
        .$_POST["email"]
        ."' and password='"
        .$_POST["password"]
        ."';";
        $result = $conn->query($query);
        if($result->num_rows > 0) {
            $email = $_POST['email'];
            setcookie("user", $email, time() + (86400*2), "/");
            $resp = array("success" => true, "message" => "");
        }else
            $resp = array("success" => false, "message" => "invalid username or passwrod");
    }
    
    //send data from here//

    echo json_encode($resp);

?>