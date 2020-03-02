<?php
// Create Connection
$conn = mysqli_connect('localhost', 'root', 'Alpha242!', 'phpblog');

// Check Connection
if(mysqli_connect_errno()) {
    // Connection Failed
    echo 'Failed to connect MySQL '. mysqli_connect_errno();
}