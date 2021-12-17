<?php 

require_once('constants.php');
require_once('functions/functions.php');
require_once('functions/db_functions.php');

$connection = db_connect();
Product::set_db_connection($connection);