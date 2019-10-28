<?php
    
    header('Content-Type: application/json');
    
    // Create connection
    $conn = new mysqli("localhost", "root", "", "resumeapp");
    
    if ($conn->connect_error) {
        $resp = array("success" => false, "message" => "db connection error!");
    }else {
        $query = "insert into user_auth values('"
        .$_POST["email"]
        ."', '"
        .$_POST["password"]
        ."');";
        if($conn->query($query) === TRUE) {
            setcookie("user", $_POST['email'], time() + (86400*2), "/");
            $resp = array("success" => true, "message" => "");
        }else
            $resp = array("success" => false, "message" => "Oops! Something went wrong!");
    }
    
    echo json_encode($resp);

?>