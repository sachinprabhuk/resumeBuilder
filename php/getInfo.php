<?php

    $conn = new mysqli("localhost","root","", "resumeapp");

    $email = $_POST['email'];

    $query = "SELECT * FROM personal WHERE email= '$email'";

    $result= $conn->query($query);

    if($result->num_rows > 0) {
        $result = mysqli_fetch_array($result,MYSQLI_ASSOC);
        $resp = array("success" => true, "message" => "", "result"=> $result);
    }else
        $resp = array("success" => false, "message" => "invalid username or passwrod");

    echo json_encode($resp);

    //$resp = array("success" => true, "message" => "123");

    //echo json_encode($resp);
?>