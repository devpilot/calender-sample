<?php

include 'cale.func.php';

if($_GET['action'] == 'loadcal'){
    
    $month = '';
    $year = '';
    if(isset($_GET['calnav'],$_GET['now'])){
    
    $date = explode('/', $_GET['now']);
    $month = (int) $date[0];
    $year = (int) $date[1];
    
    if($_GET['calnav'] == 'next'){
        if($month < 12){
            $month++;
        } else {
            $month = 1;
            $year++;
        }
    } else {
        if($month > 1){
            $month--;
        } else {
            $month = 12;
            $year--;
        }
    }
}

    header('Content-type: application/json');
    echo json_encode(get_calender($month,$year));
}

?>