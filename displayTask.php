<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];
if(!isset($userID)){
  header ('location:index.php');
}

if(isset($_GET['logout'])){
   unset($userID);
   session_destroy();
   header('location:index.php');
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>My Task</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">


  <style>
  </style>
</head>

<body>
  <!-- ----------------------------- navbar ----------------------------- -->
<div style="font-size: 1.2em " class=" w3-monospace w3-bar w3-border w3-red">
  <span href="#" style = "font-weight: bolder" class="w3-bar-item ">IMPRINT</span>
  <a href="displayTask.php" class="w3-bar-item w3-button  w3-hover-text-black w3-hover-none w3-text-black">To-do List</a>
  <a href="profile.php" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none ">Profile</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none ">Forum</a>
  <a href="index.php?logout=<?php echo $userID; ?>" onclick="return confirm('Are you sure you want to logout?');" class="w3-bar-item w3-button w3-yellow w3-right w3-hover-text-red w3-hover-yellow">Log Out</a>
</div>

  <!-- ----------------------------- navbar ------------------------------->

  <div class="w3-container w3-section">
    <button class="w3-btn w3-red" style= "text-shadow: 1px 1px 0 #444">
      <a href="addTask.php" style="text-decoration: none">Add a Task</a>
    </button>
  </div>

  <div class="w3-container">
    <table class="w3-table-all">
      <thead>
        <tr class="w3-theme-dark">
          <th scope="col">📃 Tasks</th>
          <th scope="col">🗓️ Due Date</th>
          <th scope="col">⭐ Important?</th>
          <th scope="col">🛠️ Operation</th>
          <th scope="col">✅ Done</th>
        </tr>
      </thead>
      <tbody>
        <?php

        $sql = "Select * from `todo` where user_id=$userID";
        $result = mysqli_query($conn, $sql);
        if ($result) {
          while ($row = mysqli_fetch_assoc($result)) {
            $id = $row['id'];
            $task = $row['task'];
            $deadline = $row['deadline'];
            $important = $row['important'];
            echo '<tr>
            <td>' . $task . '</td>
            <td>' . $deadline . '</td>
            <td style = "font-weight: bold">' . $important . '</td>
            <td><a href="editTask.php?updateid=' . $id . '"  class="w3-button w3-border w3-white w3-border-blue w3-round w3-hover-blue"><i class="material-icons">launch</i></a></a></td>
            
            <td><a href="completedTask.php?completeid=' . $id . '" class="w3-button w3-border w3-white w3-border-blue w3-round w3-hover-blue"><i class="material-icons">done</i></a></td>
          </tr>';
          }
        }
        ?>

      </tbody>
    </table>
  </div>

</body>

</html>