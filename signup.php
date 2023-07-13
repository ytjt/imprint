<?php

include 'connect.php';

if(isset($_POST['submit'])){

   $fullname = mysqli_real_escape_string($conn, $_POST['fullname']);
   $dob = mysqli_real_escape_string($conn, $_POST['dob']);
   $course = mysqli_real_escape_string($conn, $_POST['course']);
   $gender = mysqli_real_escape_string($conn, $_POST['gender']);
   $username = mysqli_real_escape_string($conn, $_POST['username']);
   $contactnum = mysqli_real_escape_string($conn, $_POST['contactnum']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
  $image = $_FILES['image'];

  $imagefilename = $image['name'];
  $imagefileerror = $image['error'];
  $imagefiletemp = $image['tmp_name'];

  $filename_separate = explode('.', $imagefilename);
  $file_extension = strtolower($filename_separate[1]);
  $extension = array('jpeg', 'jpg', 'png');

  if (in_array($file_extension, $extension)) {
    $upload_image = 'images/' . $imagefilename;
    move_uploaded_file($imagefiletemp, $upload_image);
    $sql = "insert into `users` (username, fullname, gender, dob, contactnum, course, email, password, image) values ('$username','$fullname', '$gender', '$dob', '$contactnum', '$course', '$email', '$pass','$upload_image')";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      $message[] = 'Registered successfully!';
      header('refresh: 1; location:index.php');
    } else {
      die(mysqli_error($conn));
    }
  }



}

?>

<!DOCTYPE html>
<html>

<head>
  <title>Register</title>
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <style>
    body {
      font-family: Arial, Helvetica, sans-serif;
      background-color: black;
    }

    * {
      box-sizing: border-box;
    }

    /* Add padding to containers */
    .container {
      padding: 16px;
      background-color: white;
    }

    /* Full-width input fields */
    input[type='text'],
    input[type='password'] {
      width: 100%;
      padding: 15px;
      margin: 5px 0 22px 0;
      display: inline-block;
      border: none;
      background: #f1f1f1;
    }

    input[type='text']:focus,
    input[type='password']:focus {
      background-color: #ddd;
      outline: none;
    }

    /* Overwrite default styles of hr */
    hr {
      border: 1px solid #f1f1f1;
      margin-bottom: 25px;
    }

    /* Set a style for the submit button */
    .registerbtn {
      background-color: #04aa6d;
      color: white;
      padding: 16px 20px;
      margin: 8px 0;
      border: none;
      cursor: pointer;
      width: 100%;
      opacity: 0.9;
    }
  .message{
   position: sticky;
   top:0; left:0; right:0;
   padding:15px 10px;
   background-color: var(--black);
   text-align: center;
   z-index: 1000;
   box-shadow: var(--box-shadow);
   color:var(--white);
   font-size: 20px;
   text-transform: capitalize;
   cursor: pointer;
}
    .registerbtn:hover {
      opacity: 1;
    }

    /* Add a blue text color to links */
    a {
      color: dodgerblue;
    }

    /* Set a grey background color and center the text of the "sign in" section */
    .signin {
      background-color: #f1f1f1;
      text-align: center;
    }

    /* -------------------------- Dropdown CSS -------------------------- */
    .dropbtn {
      background-color: #4caf50;
      color: white;
      padding: 16px;
      font-size: 16px;
      border: none;
      cursor: pointer;
    }

    .dropdown {
      position: relative;
      display: inline-block;
    }

    .dropdown-content {
      display: none;
      position: absolute;
      background-color: #f9f9f9;
      min-width: 160px;
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
      z-index: 1;
    }

    .dropdown-content a {
      color: black;
      padding: 12px 16px;
      text-decoration: none;
      display: block;
    }

    .dropdown-content a:hover {
      background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
      display: block;
    }

    .dropdown:hover .dropbtn {
      background-color: #3e8e41;
    }
  </style>
</head>
<!-- ---------------------------------------- Main ---------------------------------------- -->


<body>
  <?php
if(isset($message)){
   foreach($message as $message){
      echo '<div class="message" onclick="this.remove();">'.$message.'</div>';
   }
}
?>
  <form action="" method="post" enctype="multipart/form-data">
    <div class="container">
      <h1>Register</h1>
      <p>Please fill in this form to create an account.</p>
      <hr />

      <label for="fullname"><b>Fullname</b></label>
      <input type="text" placeholder="Enter Fullname" name="fullname" required />
      <br />
      <label for="dob"><b>Date of Birth</b></label>
      <br />
      <input type="date" id="dob" name="dob" required />
      <br />
      <br />

      <b>Please Select Your Course</b>
      <br />
      <div>
  <select class="w3-select w3-border" name="course">
    <option disabled selected>Course</option>
    <option value="SECJH">Bachelor of Software Engineering (SE)</option>
    <option value="MPE">Bachelor of Mechanical Precision Engineering (MPE)</option>
    <option value="ESE">Bachelor of Electronic Systems Engineering (ESE) </option>
    <option value="CPE">Bachelor of Chemical Process Engineering (CPE) </option>
  </select>
      </div>
      <br />
      <br />
      <b>Please Select Your Gender</b>
      <br />
      <div>
        <input type="radio" name="gender" value="female" required />
        <label for="female">Female</label><br />
        <input type="radio" name="gender" value="male" required />
        <label for="male">Male</label><br />
      </div>
      <br />
      <br />
      <label for="username"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="username" id="username" required />
      <label for="contactnum"><b>Contact Number</b></label>
      <input type="text" placeholder="Enter your contact number as 60123456789" name="contactnum" required />
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Your Email Address (eg. abc@example.com)" name="email" id="email" required />

      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="password" required />

      <label for="image"><b>Upload an Image</b></label><br />
      <input type="file" name="image" required />

      <hr />

      <button type="submit" name="submit" class="registerbtn">
        Register
      </button>
    </div>
  </form>
  <div class="container signin">
    <p>Already have an account? <a href="index.php">Sign in</a>.</p>
  </div>
</body>

</html>