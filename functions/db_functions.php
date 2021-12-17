<?php 

function db_connect() {
    $connection = new mysqli(SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    db_connection_confirm($connection);
    return $connection;
}

function db_connection_confirm($connection) {
    if($connection->connect_errno) {
        $message = "There was an error connection to database (" . $connection->connect_errno . ") " . $connection->connect_error;
        die($message);
    }
}

function db_disconnect($connection) {
    if(isset($connection)) {
        $connection->close();
    }
}