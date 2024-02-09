<?php
 session_start();
if ($_POST) {

    if(!empty($_REQUEST['full-name']) && !empty($_REQUEST['phone-number']) && !empty($_REQUEST['age']) && !empty($_REQUEST['address']) && !empty($_REQUEST['email']) && !empty($_REQUEST['username']) && !empty($_REQUEST['password']) && !empty($_REQUEST['re-entered-password'])){
        $to = $_REQUEST['email'];
        $subject = 'Account activation in Phoenix Futsal'; 
        $message = "Hello  " . $_REQUEST['full-name'] . ". This is Mail from Phoenix Futsal to authenticate " . $_REQUEST['email'] . " is your email. Click here to activate your account  http://localhost/Futsal Management System/for-login-register/activate_user.php?email=".$_REQUEST['email']; 
        $headers = "From: phoenixfutsal@gmail.com";
        if(mail( $to, $subject, $message, $headers )){
            $_SESSION['notice']='Please check your mail for activation link';
        }
        $fullName=$_REQUEST['full-name'];      
        $number=$_REQUEST['phone-number']; 
        $age=$_REQUEST['age']; 
        $address=$_REQUEST['address'];      
        $email=$_REQUEST['email'];      
        $userName=$_REQUEST['username'];      
        $passWord=$_REQUEST['password'];      
        $reEnteredPassword=$_REQUEST['re-entered-password'];      
        include './../landingpage/db_config.php';
        $sql="INSERT INTO customer (full_name, username,password,phone_number,address, email)
        VALUES ('$fullName', '$userName', '$passWord','$number','$address','$email')";
        if ($conn->query($sql) === TRUE) {
            header("location:login.php");
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
    else{
        $_SESSION['eMsg']='Please fill the form correctly';
        header("location:registration-form.php");
    }
}

?> 