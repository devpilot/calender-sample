<?php
/**
 * Generate calender table (month view)
 * @param int $month Default Empty
 * @param int $year Default Empty
 * @return string 
 */
function get_calender($month ='', $year='') {
    $date = time();
    $curr = array();
    $curr['day'] = date('d', $date);
    $curr['month']= date('n', $date);
    $curr['year'] = date('Y', $date);
    
    if(!$month && !$year){
        $month = $curr['month'];
        $year = $curr['year'];
    }    

    $first_day = mktime(0, 0, 0, $month, 1, $year);

    $days_in_month = cal_days_in_month(0, $month, $year);

    $title = date('F', $first_day)." ".$year;

    $day_of_week = date('D', $first_day);

//Week starts on Monday
    switch ($day_of_week) {
        case "Mon": $blank = 0;
            break;
        case "Tue": $blank = 1;
            break;
        case "Wed": $blank = 2;
            break;
        case "Thu": $blank = 3;
            break;
        case "Fri": $blank = 4;
            break;
        case "Sat": $blank = 5;
            break;
        case "Sun": $blank = 6;
            break;
    }
    
    $table = "<table><tr><th>Monday</th><th>Tuesday</th><th>Wednesday</th>
    <th>Thursday</th><th>Friday</th><th>Saturady</th>
    <th style=color:red;>Sunday</th></tr><tr>";

    $day_count = 1;

//Insert blank cell at begaining
    while ($blank > 0) {
        $table .= "<td class=blank></td>";
        $blank--;
        $day_count++;
    }

    $day_num = 1;

    while ($day_num <= $days_in_month) {
        
        // add today id on curr date
        if ($day_num == $curr['day'] && $month == $curr['month'] && $year == $curr['year']) {
            $table.= "<td id=today class=active data-value=$day_num/$month/$year><div class=date title='Click to Add event'>$day_num</div></td>";
        } else {
            $table.= "<td class='active' data-value=$day_num/$month/$year><div class=date title='Click to Add event'>$day_num</div></td>";
        }
        $day_num++;
        $day_count++;

        if ($day_count > 7) {
            $table .= "</tr><tr>";
            $day_count = 1;
        }
    }

//Insert blank cell end
    while ($day_count > 1 && $day_count <= 7) {
        $table .= "<td class=blank></td>";
        $day_count++;
    }
    $table .= "</tr></table>";
    
    $data = array();
    $data['numb'] = "$month/$year";
    $data['title'] = $title;
    $data['table'] = $table;
    return $data;
}

?>
