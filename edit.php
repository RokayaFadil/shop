<?php
session_start();
include "db_conn.php";
$data = json_decode(file_get_contents("php://input"));
if (count($data) > 0) {
    $user_name     = mysqli_real_escape_string($connect, $data->name);
    $password    = mysqli_real_escape_string($connect, $data->password);
        $btn_name = $data->btnName;
    if ($btn_name == 'Update') {
        $id    = $data->id;
        $query = "UPDATE insert_emp_info SET name = '$user_name', password = '$password' WHERE id = '$id'";
        if (mysqli_query($connect, $query)) {
            echo 'Updated Successfully...';
        } else {
            echo 'Failed';
        }
    }
}
?>



<script>
 
// Get the modal
var modal = document.getElementById("myModal");

// Get the button that opens the modal
var btn = document.getElementById("Btn_edit");

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks the button, open the modal 
btn.onclick = function() {
  modal.style.display = "block";
}

$('#save').click(function(){
      $.ajax({
        url : 'function.php',
        method : 'post',
        data : {name: name , password:password},
        success:function(response){
          console.log(response);
          alert("done");
        }
      })
    })    
    
// When the user clicks on <span> (x), close the modal
span.onclick = function() {
  modal.style.display = "none";
}

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>