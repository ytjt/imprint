<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];

$id = $_GET['updateid'];
$sql = "Select * from `todo` where id=$id AND user_id = '$userID'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$task = $row['task'];
$deadline = $row['deadline'];
$important = $row['important'];
if (isset($_POST['submit'])) {

    $task = $_POST['task'];
    $deadline = $_POST['deadline'];
    $important = $_POST['important'];

    $sql = "update `todo` set task='$task', deadline='$deadline', important='$important' where id=$id AND user_id = '$userID'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header('location:displayTask.php');
    } else {
        die(mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Edit Task</title>
    <link
      href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet"
    />

    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://www.w3schools.com/lib/w3-theme-red.css"
    />
  </head>

  <body>
    <!-- ----------------------------- navbar ----------------------------- -->

    <div style="font-size: 1.2em" class="w3-monospace w3-bar w3-border w3-red">
      <span href="#" style="font-weight: bolder" class="w3-bar-item"
        >IMPRINT</span
      >
      <a
        href="displayTask.php"
        class="w3-bar-item w3-button w3-hover-text-black w3-hover-none"
        >To-do List</a
      >
      <a
        href="profile.php"
        class="w3-bar-item w3-button w3-hover-text-black w3-hover-none"
        >Profile</a
      >
      <a
        href="#"
        class="w3-bar-item w3-button w3-hover-text-black w3-hover-none"
        >Forum</a
      >
      <a
        href="index.php?logout=<?php echo $userID; ?>" onclick="return confirm('Are you sure you want to logout?');"
        class="w3-bar-item w3-button w3-yellow w3-right w3-hover-text-red w3-hover-yellow"
        >Log Out</a
      >
    </div>
    <!-- ----------------------------- navbar ------------------------------->

    <div class="w3-container w3-padding w3-margin">
      <form method="post">
        <div class="w3-section">
          <label for="task" style="font-size: 1.3em">Task</label>
          <input
            type="text"
            class="w3-input"
            name="task"
            placeholder="What are you going to do?"
            required
            value= <?php
            echo
            $task;
            ?>
          />
        </div>

        <div class="w3-section">
          <label for="deadline" style="font-size: 1.3em">Deadline</label>
          <input
            type="date"
            class="w3-input"
            name="deadline"
            value=<?php
            echo
            $deadline;
            ?>
          />
        </div>

        <div class="w3-section">
        <label for="important" style="font-size: 1.3em">Important?</label>

        <div class="w3-section">
          <input class="w3-check" type="checkbox" name="important" value=<?php
            echo
            $important;
            ?> />
          <label  for="important" style="font-size: 1.2em"> Yep </label>
        </div>

        <div class="w3-section">
          <button class="w3-btn w3-yellow" style= "text-shadow: 1px 1px 0 #444" type="submit" name="submit"> Update
          </button>
        </div>
      </form>
    </div>
  </body>
</html>
