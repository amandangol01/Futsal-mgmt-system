<?php
$conn=mysqli_connect('localhost','root','','phoenix_futsal_db');
if(isset($_POST['submit'])){
    $user=mysqli_real_escape_string($conn,$_POST['uname']);
    $phone=mysqli_real_escape_string($conn,$_POST['phone']);
    $email=mysqli_real_escape_string($conn,$_POST['email']);
    $pwd=sha1($_POST['pass']);
    $rpwd=sha1($_POST['repass']);
    $ut=$_POST['user_type'];

    $query="select * from userinfo where Username='$user' and Password='$pwd'";

    $result=mysqli_query($conn,$query);
    if(mysqli_num_rows($result)>0){
        $error[]='user already exist!';
    }
    elseif($pwd!=$rpwd){
            $error[]='password not matched!';   
        }
    else{
        $insert="insert into userinfo(Username,Phone,Email,Password,user_type) values('$user','$phone','$email','$pwd','$ut')";
        mysqli_query($conn,$insert);
        header('location:login-form.php');
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
            <h3>register now</h3>
            <?php
            if(isset($error)){
                foreach($error as $error){
                    echo '<span class="error-msg">'.$error.'</span>';
                }
            };
            ?>
            <input type="text" name="uname" required placeholder="username">
            <input type="number" name="phone" required placeholder="Phone Number">
            <input type="email" name="email" required placeholder="Email">
            <input type="password" name="pass" required placeholder="Enter your password">
            <input type="password" name="repass" required placeholder="Re-enter your password">
            <select name="user_type" id="">
                <option value="user">User</option>
                <option value="admin">admin</option>
            </select>
            <input type="submit" name="submit" value="register" class="form-btn">
            <p>Already Have An Account?<a href="login-form.php">Login</a></p>
        </form>
    </div>
</body>
</html>