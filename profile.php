<?php
include 'connect.php';
session_start();
$userID = $_SESSION['userID'];

  $sql = "Select * from `users` where userID=$userID";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
  $username = $row['username'];
  $fullname = $row['fullname'];
  $gender = $row['gender'];
  $dob = $row['dob'];
  $contactnum = $row['contactnum'];
  $course = $row['course'];
  $email = $row['email'];
  $password = $row['password'];
  $image = $row['image'];
?>

<!DOCTYPE html>

<head>
  <meta charset="utf-8" />
  <title>Profile Page</title>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-red.css">
</head>

<body>
  <!----------------------------------Header------------------------------------>

<div style="font-size: 1.2em " class=" w3-monospace w3-bar w3-border w3-red">
  <span href="#" style = "font-weight: bolder" class="w3-bar-item ">IMPRINT</span>
  <a href="displayTask.php" class="w3-bar-item w3-button  w3-hover-text-black w3-hover-none">To-do List</a>
  <a href="profile.php" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none w3-text-black ">Profile</a>
  <a href="#" class="w3-bar-item w3-button w3-hover-text-black w3-hover-none ">Forum</a>
  <a href="index.php?logout=<?php echo $userID; ?>" onclick="return confirm('Are you sure you want to logout?');" class="w3-bar-item w3-button w3-yellow w3-right w3-hover-text-red w3-hover-yellow">Log Out</a>
</div>

  <!----------------------------------Header------------------------------------>

  <div style="w3-container w3-margin ">
    <div class="w3-section w3-padding">
      <img style="width: 200px;" src= '<?php echo $image; ?>' class="w3-circle w3-margin-top" alt="profile picture" />
      <label for="image">Profile Picture</label>
    </div>

    <div class="w3-section w3-padding">
      <label for="fullname" >Full Name</label>
      <input type="text" class="w3-input" name="fullname" value=<?php echo $fullname; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="dob" >Date Of Birth</label>
      <input type="text" class="w3-input" name="dob" value=<?php echo $dob; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="gender" >Gender</label>
      <input type="text" class="w3-input" name="gender" value=<?php echo $gender; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="course">Course</label>
      <input type="text" class="w3-input" name="course" value=<?php echo $course; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="username">Username</label>
      <input type="text" class="w3-input" name="username" value=<?php echo $username; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="email">Email address</label>
      <input type="text" class="w3-input" name="email" value=<?php echo $email; ?> disabled />
    </div>

    <div class="w3-section w3-padding">
      <label for="email">Password</label>
      <input type="password" class="w3-input" name="password" value=<?php echo $password; ?> disabled/>
    </div>

    <div class="w3-section w3-padding">
      <label for="email">Contact Number</label>
      <input type="text" class="w3-input" name="contactnum" value=<?php echo $contactnum; ?> disabled />
    </div>
  </div>

</body>

</html>