<?php

$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if (mysqli_connect_errno()) {
    echo 'Failed to connect to MYSQL ' . mysqli_connect_errno();
}

?>
