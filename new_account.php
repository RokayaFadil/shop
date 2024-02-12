<?php
session_start();
include "db_conn.php";
if (isset($_POST['uname']) || isset($_POST['password'])) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: creaet_account.php?error=User Name is required");
        exit();
    } 
    else if (empty($pass)) {
        header("Location: creaet_account.php?error=Password is required");
        exit();
    } 
    else {
        $sql = "SELECT * FROM users WHERE user_name='$uname'";
  	 $results = mysqli_query($conn, $sql);
  	 if (mysqli_num_rows($results) > 0) {
        header("Location: javascript.php?error=Name was taken");
        }
    else{
        $sql = "INSERT INTO users(user_name, password) value('$uname','$pass')";
        $result = mysqli_query($conn, $sql);
    header("Location: home2.php?x=$uname"); 
    }
}  
}
 