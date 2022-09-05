<?php
    
    namespace controllers;
    require_once '..\models\conference_data.php';

    $detailData = new \data\ConferenceData();

    $id = $_GET['id'];
    $result = $detailData->details($id);
    
    
    exit($result);
?>