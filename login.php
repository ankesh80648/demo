<?php
session_start();
include "db_conn.php";

if(isset($_POST['uname']) && isset($_POST['password'])){

    //function validate($data){
      //  $data = trim($data);
        //$data = stripslashes($data);
        //$data = htmlspecialchars($data);
        //return data;
    //}


$uname = $_POST['uname'];
$pass = $_POST['password'];

if(empty($uname)) {
    header ("Location: index.php?error=User Name is required");
    exit();
}
else if(empty($pass)) {
    header("Location: index.php?error=Password is required");
    exit();
}

$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";
echo "$sql";
$result = mysqli_query($conn, $sql);
//print_r($result);
$num=mysqli_num_rows($result);
echo $num;
 if(mysqli_num_rows($result) ==1) {
    $row = mysqli_fetch_assoc($result);
    if($row['user_name'] === $uname && $row['password'] === $pass) {
        echo "Logged In!";
        $_SESSION['user_name'] = $row['user_name'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['id'] = $row['id'];
        header("Location: home.php");
        //exit();
    }
 }else if(mysqli_num_rows($result)==0){
    header("Location: index.php?error=Incorrect User Name or Password");

 }
}
 else{
    header("Location: index.php");
    //exit();
 }
