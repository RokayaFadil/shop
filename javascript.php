<?php
session_start();
include "db_conn.php";
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>TABLE</title>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
    <?php
    $rows = mysqli_query($conn, "SELECT * FROM users");
    ?>
    <h1>Name was taken</h1>
    <table>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Password</th>
        <th>Action</th>
        <th>Action</th>
      </tr>
    <?php foreach($rows as $row) : ?>
      <tr id = "<?php echo $row["id"]; ?>">
        <td><?php echo $row["id"]; ?></td>
        <td id="name_old"><?php echo $row["user_name"]; ?></td>
        <td id="pass_old"><?php echo $row["password"]; ?></td>
        <td> <button type="button" name="Btn_del" onclick = "deletedata(<?php echo $row['id']; ?>);">Delete</button> </td>
        <td> <button type="button" name="Btn_edit" onclick = "edit_data()">Edit</button> </td>
         
<div id="myModal" class="modal">

<div class="modal-content">
  <span class="close">&times;</span>
  <p>Edit your account</p>
  <label>User Name </label>
  <input type="text" id="name_new" name="uname" placeholder="User Name"><br>
  <label>Password </label>
  <input type="text" id="password" name="Password" placeholder="Password"><br>
  <button type="submit" id="save" onclick = "up_data(<?php echo $row['id']; ?>);">Edit</button><br>
</div>

</div>
      </tr>
    <?php endforeach; ?>
    </table>
     

    <a href="creaet_account.php">BACK</a>
    <script type="text/javascript">
      
      function deletedata(id){
        $(document).ready(function(){
          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
              // Get value
              idx: id,
              actionx: "delete"
            },
            success:function(response){
              // Response is the output of action file
              if(response == "ok"){
                alert("Data Deleted Successfully");
                document.getElementById(id).style.display = "none";
                document.location.reload(true)
              }
              else if(response == 0){
                alert("Data Cannot Be Deleted");
              }
            }
          });
        });
      };
var modal = document.getElementById("myModal");
var span = document.getElementsByClassName("close")[0];


      function edit_data(){
        modal.style.display = "block";
      
       document.getElementById("name_new").value=document.getElementById("name_old").innerText;
       document.getElementById("password").value=document.getElementById("pass_old").innerText;
         
        };

span.onclick = function() {
  modal.style.display = "none";
}

function up_data(id){
        $(document).ready(function(){
          var name_new = document.getElementById("name_new") .value;
        var password = document.getElementById("password").value;
          $.ajax({
            // Action
            url: 'function.php',
            // Method
            type: 'POST',
            data: {
             name: name_new,
             pass: password,
              id: id,
              action: "edit"
            },
            success:function(response){
              console.log (123)
              if(response == "done"){
                alert("Data updat Successfully");
                document.location.reload(true)
              }
            }
          });
        });
      };
    </script>
  
  </body>
</html>