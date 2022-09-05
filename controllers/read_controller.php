<?php
    
    namespace controllers;
    require_once '..\models\conference_data.php';

    $readData = new \data\ConferenceData();

    $result = $readData->read();
    
    exit($result);
?>