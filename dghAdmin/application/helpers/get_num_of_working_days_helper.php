<?php

function getWorkingDays($startDate, $endDate) {
    
    $begin = strtotime($startDate);
    $end = strtotime($endDate);

    if ($begin > $end) {

        echo 'startdate is in the future! <br />';
        return 0;
    } else {

        $no_days = 0;
        $weekends = 0;

        while ($begin <= $end) {

            $no_days++; // no of days in the given interval
            $what_day = date('N', $begin);

            if ($what_day > 5) { // 6 and 7 are weekend days
                $weekends++;
            };

            $begin += 86400; // +1 day
        }

        $working_days = $no_days - $weekends;

        return $working_days;
    }
}
