<?php
include 'dbconnect1.php';

if(isset($_GET['delete_staff']))
{
    $delete=$_GET['delete_staff'];
$query="select * from staff_detail where staff_id='$delete'";
$rs=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($rs)){
    $image=$row['photo'];
}
unlink('staff_image/'.$image);

    $sql="delete from staff_detail where staff_id='$delete'";
    $run=mysqli_query($conn,$sql);
    if($run){
        echo "<script>window.open('view_staff.php?delete_msg=Data deleted successfully','_self')</script>";
    }
}
?>