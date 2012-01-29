<?php

include 'cale.func.php';

if($_GET['action'] == 'loadcal'){
    
    if(isset($_GET['calnav'],$_GET['now'])){
    
    $date = explode('/', $_GET['now']);
    $month = (int) $date[0];
    $year = (int) $date[1];
    
    if($_GET['calnav'] == 'next'){
        $month++;
    } else {
        
    }
}

    header('Content-type: application/json');
    echo json_encode(get_calender());
}

?>