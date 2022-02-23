<?php
$conn=mysqli_connect("localhost","root","","crud");
if($conn){
   // echo "connected database:";
}
else{
    echo "not connected";
}
if(isset($_GET['delete'])){
    $id=$_GET['delete'];
    $sql="delete from todo where id='$id'";
    mysqli_query($conn,$sql);
    header('location:todo.php');
}

?>