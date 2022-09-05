<?php
    
    namespace controllers;
    require_once '..\models\conference_data.php';

    $inputData = new \data\ConferenceData();
   
    if(isset($_POST["title"]) && isset($_POST["meetingdate"])){
        $title = htmlentities($_POST["title"]);
        $meetingdate = htmlentities($_POST["meetingdate"]);
        

        $inputData->setTitle($title);
        $inputData->setDate($meetingdate);

        if(isset($_POST['address']) || isset($_POST['country'])){
            $address = htmlentities($_POST["address"]);
            $country = htmlentities($_POST["country"]);

            $inputData->setAddress($address);
            $inputData->setCountry($country);
        }

        $inputData->create();
    }

    header("Location: http://localhost/"); 
    
    exit();
?>