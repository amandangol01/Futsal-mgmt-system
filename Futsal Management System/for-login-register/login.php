<?php
session_start();
include './../landingpage/db_config.php';
$error_message = '';
if (isset($_POST['login'])) {
  $username = mysqli_real_escape_string($conn, $_POST['username-for-login']);
  $password = mysqli_real_escape_string($conn, $_POST['password-for-login']);
  $sql = "SELECT id , username , password FROM customer where username='$username' && password='$password' && status=1";
  $result = $conn->query($sql);
  if ($result->num_rows > 0) {
    // output data of each row
    if ($row = $result->fetch_assoc()) {
      session_unset();
      //for unseting session used in activation link
      $_SESSION['USER_ID'] = $row['id'];
      $_SESSION['USER_NAME'] = $row['username'];
      header("location:./../landingpage/main-content.php");
    }
  } else {
    $error_message = "please enter valid <br> username and password";
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- <link rel="stylesheet" href="style-for-login.css"> -->
    <link rel="stylesheet" href="style-for-login-register.css">
    <link rel="shortcut icon" href="./../images/tab_icon.png">
    <!-- <script src="./../jQuery/JsForLoginRegister.js"> -->
    <title>login page</title>
    <!-- for font -->
    <link
        href="https://fonts.googleapis.com/css2?family=Cookie&family=Dancing+Script:wght@500&family=Festive&family=Indie+Flower&family=Kaushan+Script&family=Redressed&display=swap"
        rel="stylesheet">
</head>

<body>
    <?php
  include 'loginBody.php';
  ?>
    <p class="text-align-center bg-color-root">
        <a href="http:\\localhost\FoodOrdering\for-login-register\registration-form.php">Create A New Account</a>
        <br>
        <span>
          <?=(isset($_SESSION['notice'])) ?  $_SESSION['notice'] : ''; ?>
          <?=(isset($_SESSION['eMsg'])) ? $_SESSION['eMsg'] : '' ?>
        </span>
    </p>


</body>

</html>