<?php


// localhost
define("DB_HOST",'localhost');
define("DB_USER",'root');
define("DB_PASS",'');
define("DB_NAME",'photography');

//hosting
//define("DB_HOST",'localhost');
//define("DB_USER",'id2478934_sgryt');
//define("DB_PASS",'sgryt2010');
//define("DB_NAME",'id2478934_photography');


$connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if (!$connection) {
    die('Database connection failed' . mysqli_error($connection));
}