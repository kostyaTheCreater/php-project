<?php
    
    namespace controllers;
    require_once '..\models\conference_data.php';
    
    $deleteData = new \data\ConferenceData();
       
    $id = $_GET['id'];
    $deleteData->delete($id);
    
    exit();
?>