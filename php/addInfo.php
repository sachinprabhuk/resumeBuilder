<?php


    if(!isset($_COOKIE["user"])) {
        $resp = array("success" => false, "message"=>"", "auth"=> false);
        exit;
    }
    $conn = new mysqli("localhost","root","", "resumeapp");

    
    $email= $_COOKIE['user']; 
    $fname= $_POST['fname'];
    $lname= $_POST['lname'];
    $descr= $_POST['description'];
    $contact= $_POST['contact'];

    $query = "DELETE FROM personal WHERE email = '$email'";
    $conn->query($query);

    $query = "DELETE FROM education WHERE email = '$email'";
    $conn->query($query);

    $query = "DELETE FROM projects WHERE email = '$email'";
    $conn->query($query);

    
    $query= "INSERT INTO personal VALUES('$email', '$fname', '$lname', '$descr', '$contact')";
    if($conn->query($query)===TRUE){
        $resp = array("success" => true, "message" => "");
    }else
        $resp = array("success" => false, "message" => $conn->error);


    $institution_array = json_decode($_POST['institutions'], true);
    echo json_encode($_POST['institutions']);
    exit;

    foreach($institution_array as $currentData){
        $name= $currentData["name"];
        $description= $currentData["description"];
        $query= "INSERT INTO education VALUES('$email', '$name', '$description', '$descr', '$contact')";
        if($conn->query($query)===TRUE){
            $resp = array("success" => true, "message" => "");
        }else
            $resp = array("success" => false, "message" => $conn->error);
    }            
    /*        
    $query= "INSERT INTO personal VALUES('$email', '$fname', '$lname', '$descr', '$contact')";
    if($conn->query($query)===TRUE){
        $resp = array("success" => true, "message" => "");
    }else
        $resp = array("success" => false, "message" => $conn->error);    
    */
    echo json_encode($resp);
   





    
     

?>