<?php

include 'cale.func.php';
// include_once 'connect.php';

if(isset($_GET['action']) && $_GET['action'] == 'loadcal'){

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
    } else if($_GET['calnav'] == 'prev'){
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

if(isset($_GET['action'],$_GET['now']) && $_GET['action'] == 'get-data'){

    $date = explode('/', $_GET['now']);
    $month = (int) $date[0];
    $year = (int) $date[1];
    $data = array();
    // $query = mysql_query("SELECT DAY(start_time) AS day_num, TIME(start_time) AS s_time, title FROM events WHERE MONTH(start_time) = $month AND YEAR(start_time) = $year");
    // while ($row = mysql_fetch_assoc($query)) {
    //     $data['d'.$row['day_num']] = $row;
    // }
    header('Content-type: application/json');
    if ($data) {
        echo json_encode($data);
    }
}

?>
