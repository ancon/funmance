<?php

/**
 * Test the time function
 */

$today = strtotime('2019-08-14');

$tomorrow = strtotime('2018-08-15');

$time  = $tomorrow - $today;

$date = abs($time/86400);
print_r($time);
echo '<br />';
print_r($date);

?>