<?php
$bearer_token = 'AAAAAAAAAAAAAAAAAAAAAHVKbgAAAAAACFHrwwRdkrZIOu%2B5I5lWdwoKX%2BU%3Dj7vpK2YlUjlXlXV2MyCLBGME9kbwqTGy16qXB6OUdiaz1K8Nen';

function get_tweets($geocode) {
    global $bearer_token;
    $url = 'https://api.twitter.com/1.1/search/tweets.json?geocode=' .  $geocode . ',5mi&lang=en&result_type=recent&filter_level=medium&count=60';

    $ch = curl_init();

    curl_setopt($ch, CURLOPT_URL, $url); // request URL
    curl_setopt($ch, CURLOPT_HTTPHEADER, array( 'Authorization: Bearer ' . $bearer_token )); // custom headers
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
    curl_setopt($ch, CURLOPT_HEADER, 0); 
    curl_setopt($ch, CURLOPT_ENCODING, 'gzip'); // accept gzip to speedup request

    $result = curl_exec($ch); // execute 
    curl_close($ch); 

    return $result;
}

header('Content-Type: application/json');

print(get_tweets($_GET['geocode']));

?>
