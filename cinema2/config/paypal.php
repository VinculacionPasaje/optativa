<?php

return array(
/** set your paypal credential **/
'client_id' =>'AbWkvptFLW8ymkjSEbM5UDlJsFnKdyjEI6g355yfffSIpseug1wvImkyM4oTO6ngG8TsKO6I1jfnCBI5',
'secret' => 'EJcbbHXZfTRsnyWUacOjqYfFhT-kQJcrqBnrbE5dOTHxPCBfUDb9KzFuWuzu4rk_8_M1QZ1YpWHOOEVH',
/**
* SDK configuration 
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'live',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);



?>