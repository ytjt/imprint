<?php

include 'connect.php';
session_start();

if(isset($_POST['submit'])){

   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));

   $select = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select) > 0){
      $row = mysqli_fetch_assoc($select);
      $_SESSION['userID'] = $row['userID'];
      header('location:displayTask.php');
   }else{
      $message[] = 'incorrect password or email!';
   }

}

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
   .message{
   position: sticky;
   top:0; left:0; right:0;
   padding:15px 10px;
   background-color: var(--white);
   text-align: center;
   z-index: 1000;
   box-shadow: var(--box-shadow);
   color:var(--black);
   font-size: 20px;
   text-transform: capitalize;
   cursor: pointer;
}
  </style>
</head>

<body>

<?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>

  <!-- ----------------------------- navbar ----------------------------- -->
<div style="font-size: 1.2em " class=" w3-monospace w3-bar w3-border w3-red">
  <span href="#" style = "font-weight: bolder" class="w3-bar-item ">IMPRINT</span>
  <a href="#" class="w3-bar-item w3-button  w3-hover-text-black w3-hover-none ">About Us</a>
</div>

<h2 class="w3-margin w-padding">Login Form</h2>
<div class="w3-container w3-margin-left">
  

  <form action="" method="post">
    
      <label for="username"><b>Email</b></label>
      <input class="w3-input w3-margin" type="text" placeholder="Enter Email" name="email" required />

      <label for="pwd"><b>Password</b></label>
      <input class="w3-input w3-margin" type="password" placeholder="Enter Password" name="password" required />

      <button class = "w3-margin w3-btn w3-green" type="submit" name="submit">Login</button>

      <button type="button" class="w3-margin w3-btn w3-yellow" onclick="document.location='signup.php'">
        Sign Up
      </button>
  </form>
</div>
</body>

</html>