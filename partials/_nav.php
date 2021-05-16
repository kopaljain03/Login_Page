<?php
$loggedin=false;
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true ){
  $loggedin=true;
  $uv=$_SESSION['uv'];
}
// if !loggedin + admin--> home vote create         login , signup        
//if logged in -->                        logout


if(!$loggedin){
echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php">VoteIt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Vote</a>
        </li>';
        echo '<li class="nav-item">
          <a class="nav-link" href="login.php">Create</a>
        </li>
      </ul>';
      echo '<div class="dropdown me-4">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    User Settings
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="login.php">Login</a></li>
    <li><a class="dropdown-item" href="signup.php">SignUp</a></li>
  </ul>
</div>
    </div>
  </div>
</nav>';
}        

else if($loggedin){

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="welcome.php">VoteIt</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
        </li>';
        if($uv=='asVoter'){
        echo '<li class="nav-item">
          <a class="nav-link" href="vote.php">Vote</a>
        </li>';
        }
        if($uv=='asAdmin'){
        echo '<li class="nav-item">
          <a class="nav-link" href="create.php">Create</a>
        </li>';
        }
      echo ' </ul> 
              <div class="dropdown me-4">
  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
    User Settings
  </button>
  <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
  </ul>
</div>
    </div>
  </div>
</nav>';
}
?>