<?php
    namespace controllers;
    require_once '..\models\conference_data.php';

    $updateData = new \data\ConferenceData();
    
    if(isset($_POST["title"]) && isset($_POST["meetingdate"])){
        $title = htmlentities($_POST["title"]);
        $meetingdate = htmlentities($_POST["meetingdate"]);
        
        $updateData->setTitle($title);
        $updateData->setDate($meetingdate);

        if(isset($_POST['address']) || isset($_POST['country'])){
            $address = htmlentities($_POST["address"]);
            $country = htmlentities($_POST["country"]);

            $updateData->setAddress($address);
            $updateData->setCountry($country);
        }
        $id = $_POST['id'];
        $updateData->update($id);
    }

    header("Location: http://localhost/"); 
    
    exit();
?>