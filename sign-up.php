<?php
 $showAlert = false;
 $showError = false;
 $err = false;
 $er = false;
 $servername="localhost";
 $username = "root";
 $password ="";
 $database="crypto";
 $conn= mysqli_connect($servername, $username, $password, $database);
 if (!$conn) {
   die("Sorry we failed to connect".mysqli_connect_error());
 } 
 else {
    
 }
 if ($_SERVER['REQUEST_METHOD'] =="POST") {
    $username=$_POST["username"];
    $email=$_POST["email"];
    $pass=$_POST["pass"];

    $existsSql= "Select * from login where username='$username'";
    $result= mysqli_query($conn,$existsSql);
    $num = mysqli_num_rows($result);

 if ($username==""||$email=="") {
  $er=true;
 }

  else {
  if($num > 0){
    $err = true;
 }
 else{
    $hash= password_hash("$pass", PASSWORD_DEFAULT); 
    $sql= "INSERT INTO `login` (`username`, `email`, `pass`) VALUES ('$username', '$email', '$pass')";
    $result= mysqli_query($conn,$sql);
    if($result){
      header("location:log-in.php");
    }
}
 }
 
 }
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->

    <title>Online Study Library</title>
    <link rel="stylesheet" href="sign-up.css">
  </head>
  <body>
   <div class="containers" id="containers">
       <h2>Sign-Up</h2>
       <?php
       if($err){
        echo '<div id="error">PRN Alraeady Taken!!!</div>';
      }
      if($er){
        echo '<div id="error">Fill The Info Properly!!!</div>';
      }
      if($showAlert){
        echo'<div id="error">Password Dont Match!!!</div>';
      }
      
if($showError){
  echo'<div id="danger">
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
          <strong>Oops!!</strong>'.$showError.'
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">&times;</span>
         </button>
        </div>
    </div>';
 }
       ?>
       <form action="sign-up.php" method="post">
           <label for ="name"><strong>Username</strong></label><br>
           <input type="text" minlength="2" name="username" id="firstname" placeholder="Username"><br>
           <label for="email"><strong>E-mail</strong></label><br>
           <input type="email" name="email" id="email" placeholder="Enter Your Email"><br>
           <label for="password"><strong>Password</strong></label><br>
           <input type="password" name="pass" minlength="4" id="pass" placeholder="Enter Your Password"><br>
           <br>
           <div class="terms">
           <input type="checkbox" name="terms" id="terms" value="terms">
           <label for="terms">I Accept <strong>Terms Of Use </strong></label>
           </div>
           <div class="sign">
           <button type="submit">Sign-In</button><br>
         </div>
           <a href="log-in.php"><strong>Back To Log-in</strong></a>
           <!-- <button onclick="signIn()">Sign-In</button> -->

       </form>
       <!-- <script>
         function signIn(){
           var x;
         if(confirm("Your Registration Successfully")) {
           x = window.location.href = "log-in.html";
         } else {
           x =window.location.href = "sign-up.html" ;
         }
         document.getElementById("container").innerHTML = x;
       }
       </script> -->



   </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
