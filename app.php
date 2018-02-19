<?php
    include 'signalapi.php';
    $app_key = 'c742bca5-4cb7-4e54-898d-ca07e9769013';
    $auth_key = 'MmFhMDkxN2ItYTRjOC00OTg1LWJmZjItY2JhYTY4Y2RjMTQx';
    $cw_api = new CloudwaysAPIClient($app_key,$auth_key);
    $servers = $cw_api->get_servers();
    var_dump($servers);