<?php
session_start();
include "db_conn.php";

if (isset($_POST["actionx"])) {
    if ($_POST["actionx"] == "delete") {
        global $conn;
        mysqli_query($conn, "DELETE FROM users WHERE id = " . $_POST['idx'] . " ");
        echo "ok";
    }
}



if (isset($_POST["action"])) {
    if ($_POST["action"] == "edit") {
        global $conn;
        $name = $_POST['name'];
        $pass = $_POST['pass'];
        mysqli_query($conn, "UPDATE users SET user_name = '$name', password = '$pass' WHERE id = " . $_POST['id'] . "");
        echo "done";
    }
}