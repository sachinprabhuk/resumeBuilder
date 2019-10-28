<?php
    
    function insertEducation($email, $data, $conn){
        $institution_array = json_decode( stripslashes($data), TRUE);
        foreach($institution_array as $ey=>$currentData){
            $name= str_replace('"', '', $currentData["name"]);
            $description= str_replace('"', '', $currentData["description"]);
            $query= "INSERT INTO education VALUES('$email', '$name', '$description', '2019', '2019')";
            if($conn->query($query)===TRUE){
                $resp = array("success" => true, "message" => "");
            }else
                $resp = array("success" => false, "message" => $conn->error);
        }          
    }

    function insertProject($email, $data, $conn){
        $institution_array = json_decode( stripslashes($data), TRUE);
        foreach($institution_array as $ey=>$currentData){
            $name= str_replace('"', '', $currentData["name"]);
            $description= str_replace('"', '', $currentData["description"]);
            $query= "INSERT INTO projects VALUES('$email', '$name', '$description')";
            if($conn->query($query)===TRUE){
                $resp = array("success" => true, "message" => "");
            }else
                $resp = array("success" => false, "message" => $conn->error);
            }          
    }
    

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

    
    
    insertEducation($email, $_POST['institutions'], $conn);  
    
    insertProject($email, $_POST['projects'], $conn);

    echo json_encode($resp);
   





    
     

?>