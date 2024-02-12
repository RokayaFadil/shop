<!DOCTYPE html>
<html>
<head>
<title>TABLE</title>
<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<h1>Name was taken</h1>
<table>
  <tr>
    <th>ID</th>
    <th>Name</th>
    <th>Password</th>
  </tr>
  <?php
session_start();
include "db_conn.php";
$output  = array();
$query   = "SELECT * FROM users";
$results = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_array($result)) {
        $output[] = $row;
    }
    echo json_encode($output);
}
?>