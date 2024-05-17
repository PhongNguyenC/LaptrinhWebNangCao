<?php

$uri = "mysql://avnadmin:AVNS_lWzfdjNsHeVuH_YC5e8@mysql-492a8c7-st-df0a.l.aivencloud.com:13687/defaultdb?ssl-mode=REQUIRED";

$fields = parse_url($uri);

// Build the DSN including SSL settings
$conn = "mysql:";
$conn .= "host=" . $fields["host"];
$conn .= ";port=" . $fields["port"];
$conn .= ";dbname=defaultdb";
$conn .= ";sslmode=verify-ca;sslrootcert=ca.pem";
?>
