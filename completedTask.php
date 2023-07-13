<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];
if (isset($_GET['completeid'])) {
    $id = $_GET['completeid'];

    $sql = "delete from `todo` where id=$id AND user_id=$userID";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        echo "<p style='text-align:center;'><img src='https://media4.giphy.com/media/BPJmthQ3YRwD6QqcVD/giphy.gif' style='width: 50%; height: 50%; '></p>";
        header("refresh: 2; url=displayTask.php");
        echo "<h1 style='text-align:center; font-type: italic; color: gold'>Congratulations on Finishing Your Task!</h1>";
    } else {
        die(mysqli_error($conn));
    }
}
