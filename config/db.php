<?php
// Create Connection with db (DataBase)
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

// Check Connection db (DataBase)
if(mysqli_connect_errno()) {
    // Connection Failed
    echo 'Failed to connect MySQL - ' .mysqli_connect_errno();
}