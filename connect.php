<?php

$conn = new mysqli('localhost', 'root', '', 'imprint');

if (!$conn) {
    die(mysqli_error($conn));
}
