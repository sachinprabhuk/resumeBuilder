<?php

    $conn = new mysqli("localhost","root","", "resumeapp");

    $email = $_POST['email'];

    $query = "SELECT * FROM personal WHERE email= '$email'";

    $result= $conn->query($query);

    $query = "SELECT * FROM education WHERE email= '$email'";
    $result1=$conn->query($query);

    $query = "SELECT * FROM projects WHERE email= '$email'";
    $result2=$conn->query($query);
    

    if($result->num_rows > 0) {
        $result = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $result1 = mysqli_fetch_all($result1,MYSQLI_ASSOC);
        $result2 = mysqli_fetch_all($result2,MYSQLI_ASSOC);
        
        $resp = array("success" => true, "message" => "", "personalResult"=> $result, 
        "educationalResult"=>$result1, "projectsResult"=>$result2);
    }else
        $resp = array("success" => false, "message" => "invalid username or passwrod");

    echo json_encode($resp);
    
?>