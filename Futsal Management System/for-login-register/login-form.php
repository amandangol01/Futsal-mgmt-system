<?php
$conn=mysqli_connect('localhost','root','','phoenix_futsal_db');
session_start();
if(isset($_POST['submit'])){
    $user=mysqli_real_escape_string($conn,$_POST['uname']);
    $pwd=sha1($_POST['pass']);

    $query="select * from userinfo where Username='$user' and Password='$pwd'";

    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        
        $row= mysqli_fetch_array($result);

        if($row['user_type']=='admin'){
            $_SESSION['admin_name']=$row['Username'];
            header('location:adminpage.php');
        }
        elseif($row['user_type']=='user'){
            $_SESSION['user_name']=$row['Username'];
            header('location:./../Landing page/main.php');
        }
    }
    else{
        $error[]='incorrect username or password!';
    }
   
};
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style-login.css">
</head>
<body>
    <div class="form-container">
        <form action="" method="post">
            <h3>Login</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
            <input type="text" name="uname" required placeholder="username">
            <input type="password" name="pass" required placeholder="Enter your password">
            <input type="submit" name="submit" value="Login" class="form-btn">
            <p>Don't Have An Account?<a href="registration-form.php">register now</a></p>
        </form>
    </div>
</body>
</html>