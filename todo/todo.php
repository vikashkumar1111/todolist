<?php
$conn=mysqli_connect("localhost","root","","crud");
if($conn){
   // echo "connected database:";
}
else{
    echo "not connected";
}
$error='';
if(isset($_POST['submit'])){
    $textbox=$_POST['textbox'];
    if($textbox==''){
        $error='Please enter value';}
        else{
            $sql="INSERT INTO `todo`(`work`) VALUES ('$textbox')";
            mysqli_query($conn,$sql);
            header('location:todo.php');
        }
}


?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO</title>
    <link rel="stylesheet" href="index1.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
</head>
<body>
    
    <form action="" method="POST">
    <div class="main_div">
        <div class="center_div">
        <br> </br>
            <h1> ToDo List  </h1>
            <br> </br>
            <input type="text" name="textbox" placeholder="Add a Items" />
            <button type="submit" name="submit"> + </button><br>
            <span style="color:red;font: size 14px;"><?php echo $error ?></span>
                
                    <br> </br>
                    <?php
             $sql="select * from todo order by id desc";
             $res=mysqli_query($conn,$sql);
             $count=mysqli_num_rows($res);
             if($count>0){
            ?>
                    <table class="todo_style">
                    <?php
                   
                   while($row=mysqli_fetch_assoc($res)){
                       
                   ?>
                        <tr class="tr">
                            <td class="td"> &nbsp;&nbsp;&nbsp; <?php echo $row['work'] ?> </td>
                            <td>  <a href="delete.php?delete=<?php echo $row['id'] ?>"class="fa-times" title="Erase it">  <i class="bi bi-eraser-fill"></i> </a>  </td>
                           
                        </tr>
                        <?php
                    }
                ?>
                        
                </table> 
                <?php
             } else{
                 echo "No data found:";
             }
             ?>   
        </div>
    </div>  
</form>
</body>
</html>