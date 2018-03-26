<?php

function smartDate($date){

    $diff = time() - $date->timestamp;
    
       if ($diff <= 0) {
           return 'Now';
       }
       else if ($diff < 60) {
           return grammar_date(floor($diff), ' second(s) ago');
       }
       else if ($diff < 60*60) {
           return grammar_date(floor($diff/60), ' minute(s) ago');
       }
       else if ($diff < 60*60*24) {
           return grammar_date(floor($diff/(60*60)), ' hour(s) ago');
       }
       else if ($diff < 60*60*24*30) {
           return grammar_date(floor($diff/(60*60*24)), ' day(s) ago');
       }
       else if ($diff < 60*60*24*30*12) {
           return grammar_date(floor($diff/(60*60*24*30)), ' month(s) ago');
       }
       else {
           return grammar_date(floor($diff/(60*60*24*30*12)), ' year(s) ago');
       }
}  
    
function grammar_date($val, $sentence) {
    if ($val > 1) {
        return $val.str_replace('(s)', 's', $sentence);
    } else {
        return $val.str_replace('(s)', '', $sentence);
    }
}
