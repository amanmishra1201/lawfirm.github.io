<?php

error_reporting(0);
session_start();
$host = "localhost";
$user = "root";
$password = "";
$db = "advocatemanagement";

// Create a connection
$data = mysqli_connect($host, $user, $password, $db);

// Check the connection
if (!$data) {
    die("Connection failed: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    $name=$_POST['username'];
    $pass=$_POST['password'];

    $sql="select*from user where username='".$name."' AND password='".$pass."' ";

    $result=mysqli_query($data,$sql);
    $row=mysqli_fetch_array($result);

    if($row["usertype"]=="client"){

        $_SESSION['username']=$name;
        $_SESSION['usertype']="client";
        
        header("location:clienthome.php");

    }
    elseif($row["usertype"]=="admin"){
        $_SESSION['username']=$name;
        $_SESSION['usertype']="admin";
        header("location:adminhome.php");

    }
    else{
        
        $message="username or password do not match";
        $_SESSION['loginMessage']=$message;
        header("location:login.php");
    }

}


?>
