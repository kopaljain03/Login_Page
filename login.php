<?php

$shoalert=false;
$shoerror=false;
$login=false;
if($_SERVER["REQUEST_METHOD"]=="POST"){
  include 'partials/_dbconnect.php';
$username=$_POST["username"];
$password=$_POST["password"];
$uv=$_POST["uv"];
// $shoalert=true;
$sql="SELECT * FROM `users` WHERE username='$username'";
$result=mysqli_query($conn,$sql);
$num=mysqli_num_rows($result);
if($num==1){
  while(($row=mysqli_fetch_assoc($result))){
  if((password_verify($password, $row['password']))  && $uv==$row['uv']){
    $login=true;
    session_start();
    $_SESSION["loggedin"]=true;
    $_SESSION["username"]=$username;
    $_SESSION["uv"]=$uv;
    header("location: welcome.php");
  }
  else{
    $shoerror=true;
    $shoerror="Invalid credentials";
    } 
  }
}
else{
$shoerror=true;
$shoerror="Invalid credentials";
} 
}
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-wEmeIV1mKuiNpC+IOBjI7aAzPcEZeedi5yW5f2yOq55WWLwNGmvvx4Um1vskeMj0" crossorigin="anonymous">
   <style>
   #loginform{
    display: flex;
    flex-direction: column;
    align-items: center;
   }
   </style>

    <title>Login page</title>
  </head>
  <body>

    <?php require 'partials/_nav.php' ?> 

    <?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> You have been logged in successfully.
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
  if($shoerror){
    echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
    <strong>Error!</strong> '.$shoerror.'
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>';
  }
    ?>

    <div class="container">
    <br>
    <h1 class="text-center">Login here</h1>

    <form action='login.php' method='post' id='loginform'>
  <div class="mb-3 col-md-6">
    <label for="username" class="form-label">Username</label>
    <input type="email" class="form-control " id="username" name="username" maxlength="30" aria-describedby="emailHelp">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
  </div>
  <div class="mb-3 col-md-6">
    <label for="password" class="form-label">Password</label>
    <input type="password" class="form-control" id="password" name="password" maxlength="30">
  </div>
  <div class="form-check col-md-6">
  <input class="form-check-input" type="radio" name="uv" id="flexRadioDefault1" value="asAdmin">
  <label class="form-check-label" for="flexRadioDefault1">
    Admin
  </label>
</div>
<div class="form-check col-md-6">
  <input class="form-check-input" type="radio" name="uv" id="flexRadioDefault2" value="asVoter" checked>
  <label class="form-check-label" for="flexRadioDefault2">
   Voter
  </label>
</div>
<br>
  <button type="submit" class="btn btn-primary">Login</button>
  <br>
  <div>
  New user? <a href="signup.php">register here</a>
</div>
</form>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-p34f1UUtsS3wqzfto5wAAmdvj+osOnFyQFpp4Ua3gs/ZVWx6oOypYoCJhGGScy+8" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.min.js" integrity="sha384-lpyLfhYuitXl2zRZ5Bn2fqnhNAKOAaM/0Kr9laMspuaMiZfGmfwRNFh8HlMy49eQ" crossorigin="anonymous"></script>
    -->
  </body>
</html>