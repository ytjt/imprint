<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];

if(!isset($userID)){
  header ('location:login.php');
}

if(isset($_GET['logout'])){
   unset($userID);
   session_destroy();
   header('location:login.php');
};

if (isset($_POST['submit'])) {
  $task = $_POST['task'];
  $deadline = $_POST['deadline'];
  $important = $_POST['important'];

  $sql = "insert into `todo` (user_id, task, deadline,important) values ('$userID', '$task', '$deadline', '$important')";
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
  <title>Add Task</title>
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
</head>

<body>
  <!-- ----------------------------- navbar ----------------------------- -->

      <div style="font-size: 1.2em " class=" w3-monospace w3-bar w3-border w3-red">
  <span href="#" style = "font-weight: bolder" class="w3-bar-item ">IMPRINT</span>
  <a href="displayTask.php" class="w3-bar-item w3-button  w3-hover-text-black w3-hover-none">To-do List</a>
  <a href="profile.php" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none ">Profile</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none ">Forum</a>
  <a href= "index.php?logout=<?php echo $userID; ?>" onclick="return confirm('Are you sure you want to logout?');" class="w3-bar-item w3-button w3-yellow w3-right w3-hover-text-red w3-hover-yellow">Log Out</a>
</div>
  <!-- ----------------------------- navbar ------------------------------->

  <div class="w3-margin w3-padding">
    <form method="post">
      <div class="w3-section">
        <label for="task" style="font-size: 1.3em">Task</label>
        <input type="text" class="w3-input" name="task" placeholder="What are you going to do?" required />
      </div>

      <div class="w3-section">
        <label for="deadline" style="font-size: 1.3em">Deadline</label>
        <input type="date" class="w3-input" name="deadline" />
      </div>

      <div class="w3-section">
        <label for="important" style="font-size: 1.3em">Important?</label>

        <div class="w3-section">
          <input class="w3-check" type="checkbox" name="important" value="!" />
          <label  for="important" style="font-size: 1.2em"> Yep </label>
        </div>

        <div class="w3-section">
          <button class="w3-btn w3-red" style= "text-shadow: 1px 1px 0 #444" type="submit" name="submit"> Add Task
          </button>
        </div>
    </form>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>