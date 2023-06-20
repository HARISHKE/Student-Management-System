<?php
include 'dbconnect.php';
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Student Management System</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="style4.css">
<script>
    jQuery(document).ready(function($){
        $('#toggler').click(function(event)
        { 
          {
            event.preventDefault();
            $('#wrap').toggleClass('toggled');
          }
        });
    });
</script>
</head>
<body>
<div class="d-flex" id="wrap">
    <div class="sidebar bg-light border-light">
        <div class="sidebar-heading">
        <p class="text-center">Manage Students</p>
</div>
<ul class="list-group list-group-flush">
    <a href="main.php" class="list-group-item list-group-item-action">
        <i class="fa fa-vcard-o"></i>Dashboard</a>
        <a href="add_staff.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i>Add Staff Details</a> 
        <a href="view_staff.php" class="list-group-item list-group-item-action">
        <i class="fa fa-eye"></i>View Staff Details</a> 
        <a href="edit_staff.php" class="list-group-item list-group-item-action">
        <i class="fa fa-pencil"></i>Edit Staff Details</a> 
        <a href="view_student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-eye"></i>View Student Details</a> 
        <a href="edit_student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-pencil"></i>Edit Student Details</a> 
        <a href="logout.php" class="list-group-item list-group-item-action">
        <i class="fa fa-sign-out"></i>Logout</a>  
</ul>
</div>
<div class="main-body">
    <button class="btn btn-outline-light bg-info mt-3" id="toggler"><i class="fa fa-bars"></i></button>
    
    <section id="main-form">
        <h3 class="text-center text-danger"><?php echo @$_GET['update_success']; echo @$_GET['update_error']; ?></h3>
<h2 class="text-center text-dark pt-3 font-weight-bold">Student Management System</h2>
<div class="container bg-info" id="formsetting">
    <h3 class="text-center text-white pb-4 pt-3 font-weight-bold">Edit Student Details</h3>
    
<?php
if(isset($_GET['edit_student']))
{
$edit_st_id=$_GET['edit_student'];
$query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$query);
while($row=mysqli_fetch_assoc($run))
{

    ?>
    
    <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-12 m-auto">
            <div class="form-group">
                <label class="text-white">Name</label>
                <input type="text" name="fname" placeholder="Enter Your Name" class="form-control" value="<?php echo $row['fname']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">Email</label>
                <input type="email" name="email" placeholder="Enter Your Email" class="form-control" value="<?php echo $row['email']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">Father Name</label>
                <input type="text" name="fathername" placeholder="Enter Your Father Name" class="form-control" value="<?php echo $row['father_name']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">Gender</label>
                <input type="radio" name="gender" value="male" class="form-check-input ml-2" <?php if($row['gender']=='male') echo "checked"; ?>>
                <label class="form-check-label text-white pl-4">Male</label>
                <input type="radio" name="gender" value="female" class="form-check-input ml-2" <?php if($row['gender']=='female') echo "checked"; ?>>
                <label class="form-check-label text-white pl-4">Female</label>
             </div>
             <div class="form-group">
                <label class="text-white">City</label>
                <input type="text" name="city" placeholder="Enter Your City" class="form-control" value="<?php echo $row['city']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">Natinality</label>
                <input type="text" name="nationality" placeholder="Enter Your Nationality" class="form-control" value="<?php echo $row['nationality']; ?>">
             </div>
             <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describeby="inputGroupFileAddon01" name="image">
                     <label class="custom-file-label" for="inputGroupFile01">File name as student name</label>
   </div>
   </div>
   <br>
   <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon03">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile03" aria-describeby="inputGroupFileAddon03" name="doc2">
                     <label class="custom-file-label" for="inputGroupFile03">File name as reg no-10</label>
   </div>
   </div><br>

   <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon05">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile05" aria-describeby="inputGroupFileAddon05" name="doc4">
                     <label class="custom-file-label" for="inputGroupFile05">File name as reg no-tc</label>
   </div>
   </div>
<br>



        </div>
        <div class="col-md-5 col-sm-5 col-12 m-auto">
        <div class="form-group">
                <label class="text-white">Register No</label>
                <input type="text" name="regno" placeholder="Enter Your Reg No" class="form-control" value="<?php echo $row['regno']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">Birthdate</label>
                <input type="date" name="birthdate" placeholder="Enter Your Birthday" class="form-control" value="<?php echo $row['birthdate']; ?>">
             <div class="form-group">
                <label class="text-white">Mobile</label>
                <input type="text" name="mobile" placeholder="Enter Your Mobile" class="form-control" value="<?php echo $row['mobile']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">District</label>
                <input type="text" name="district" placeholder="Enter Your District" class="form-control" value="<?php echo $row['district']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">State</label>
                <input type="text" name="state" placeholder="Enter Your State" class="form-control" value="<?php echo $row['state']; ?>">
             </div>
             <div class="form-group">
                <label class="text-white">EMIS No</label>
                <input type="text" name="emis" placeholder="Enter Your EMIS No" class="form-control" value="<?php echo $row['emis']; ?>">
             </div>
             <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon02">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile02" aria-describeby="inputGroupFileAddon02" name="doc1">
                     <label class="custom-file-label" for="inputGroupFile02">File name as reg no-aadhaar</label>
   </div>
   </div>
   <br>

   <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon04">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile04" aria-describeby="inputGroupFileAddon04" name="doc3">
                     <label class="custom-file-label" for="inputGroupFile04">File name as reg no-12</label>
   </div>
   
   <?php }} ?>
   </div>
   <input type="submit" name="update" value="Update detail" class="btn btn-success px-5 mt-2">
</div>
</form>  
</div>
</div>
</div>
     
</body>
</html>


<?php
if(isset($_POST['update'])){
$edit_st_id=$_GET['edit_student'];
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$regno=mysqli_real_escape_string($conn,$_POST['regno']);
$email=mysqli_real_escape_string($conn,$_POST['email']);
$fathername=mysqli_real_escape_string($conn,$_POST['fathername']);
$birthdate=mysqli_real_escape_string($conn,$_POST['birthdate']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$nationality=mysqli_real_escape_string($conn,$_POST['nationality']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$emis=mysqli_real_escape_string($conn,$_POST['emis']);

$image = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_tmp = $_FILES['image']['tmp_name'];
$doc1= $_FILES['doc1']['name'];
$doc1_type = $_FILES['doc1']['type'];
$doc1_size = $_FILES['doc1']['size'];
$doc1_tmp = $_FILES['doc1']['tmp_name'];
$doc2= $_FILES['doc2']['name'];
$doc2_type = $_FILES['doc2']['type'];
$doc2_size = $_FILES['doc2']['size'];
$doc2_tmp = $_FILES['doc2']['tmp_name'];
$doc3 = $_FILES['doc3']['name'];
$doc3_type = $_FILES['doc3']['type'];
$doc3_size = $_FILES['doc3']['size'];
$doc3_tmp = $_FILES['doc3']['tmp_name'];
$doc4 = $_FILES['doc4']['name'];
$doc4_type = $_FILES['doc4']['type'];
$doc4_size = $_FILES['doc4']['size'];
$doc4_tmp = $_FILES['doc4']['tmp_name'];



$image_query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$image_query);
while($row=mysqli_fetch_assoc($run)){
    $img=$row['photo'];
}

unlink('st_image/'.$img);

if(!$image_type == 'image/jpg' or !$image_type == 'image/png'){
   $match_err="Invalid image formate";
}

else if($image_size<=10000){
   $size_error = "Image size is larger . Image size should be less than 2mb";

}

else{
   move_uploaded_file($image_tmp,"st_image/$image");
   $sql="update student_detail set fname='$fname',regno='$regno',father_name='$fathername',email='$email',mobile='$mobile',birthdate='$birthdate',gender='$gender',district='$district',city='$city',state='$state',nationality='$nationality',photo='$image',emis='$emis',doc1='$doc1',doc2='$doc2',doc4='$doc3',doc4='$doc4' where st_id='$edit_st_id'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              
}

$doc1_query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$doc1_query);
while($row=mysqli_fetch_assoc($run)){
    $document1=$row['doc1'];
}

unlink('aadhaardoc/'.$document1);

if(!$doc1_type == 'pdf' or !$doc1_type == 'pdf'){
   $match_err1="Invalid image formate";
}

else if($doc1_size<=10000){
   $size_error1 = "Image size is larger . Image size should be less than 10mb";

}

else{
   move_uploaded_file($doc1_tmp,"aadhaardoc/$doc1");
   $sql="update student_detail set fname='$fname',regno='$regno',father_name='$fathername',email='$email',mobile='$mobile',birthdate='$birthdate',gender='$gender',district='$district',city='$city',state='$state',nationality='$nationality',photo='$image',emis='$emis',doc1='$doc1',doc2='$doc2',doc4='$doc3',doc4='$doc4' where st_id='$edit_st_id'";
}

$doc2_query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$doc2_query);
while($row=mysqli_fetch_assoc($run)){
    $document2=$row['doc2'];
}

unlink('tenthmarkdoc/'.$document2);

if(!$doc2_type == 'pdf' or !$doc2_type == 'pdf'){
   $match_err2="Invalid image formate";
}

else if($doc2_size<=10000){
   $size_error2 = "Image size is larger . Image size should be less than 10mb";

}

else{
   move_uploaded_file($doc2_tmp,"tenthmarkdoc/$doc2");
   $sql="update student_detail set fname='$fname',regno='$regno',father_name='$fathername',email='$email',mobile='$mobile',birthdate='$birthdate',gender='$gender',district='$district',city='$city',state='$state',nationality='$nationality',photo='$image',emis='$emis',doc1='$doc1',doc2='$doc2',doc4='$doc3',doc4='$doc4' where st_id='$edit_st_id'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
}


$doc3_query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$doc3_query);
while($row=mysqli_fetch_assoc($run)){
    $document3=$row['doc3'];
}

unlink('twelfthmarkdoc/'.$document3);

if(!$doc3_type == 'pdf' or !$doc3_type == 'pdf'){
   $match_err3="Invalid image formate";
}

else if($doc3_size<=10000){
   $size_error3 = "Image size is larger . Image size should be less than 10mb";

}

else{
   move_uploaded_file($doc3_tmp,"twelfthmarkdoc/$doc3");
   $sql="update student_detail set fname='$fname',regno='$regno',father_name='$fathername',email='$email',mobile='$mobile',birthdate='$birthdate',gender='$gender',district='$district',city='$city',state='$state',nationality='$nationality',photo='$image',emis='$emis',doc1='$doc1',doc2='$doc2',doc4='$doc3',doc4='$doc4' where st_id='$edit_st_id'";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               
}



$doc4_query="select * from student_detail where st_id='$edit_st_id'";
$run=mysqli_query($conn,$doc4_query);
while($row=mysqli_fetch_assoc($run)){
    $document4=$row['doc4'];
}

unlink('tcdoc/'.$document4);

if(!$doc4_type == 'pdf' or !$doc4_type == 'pdf'){
   $match_err4="Invalid image formate";
}

else if($doc4_size<=10000){
   $size_error4 = "Image size is larger . Image size should be less than 10mb";

}

else{
   move_uploaded_file($doc4_tmp,"tcdoc/$doc4");
   $sql="update student_detail set fname='$fname',regno='$regno',father_name='$fathername',email='$email',mobile='$mobile',birthdate='$birthdate',gender='$gender',district='$district',city='$city',state='$state',nationality='$nationality',photo='$image',emis='$emis',doc1='$doc1',doc2='$doc2',doc4='$doc3',doc4='$doc4' where st_id='$edit_st_id'";

$run=mysqli_query($conn,$sql);
if($run){
 echo "<script>window.open('view_student.php?update_success=Student data updated successfully')</script>";
}
else{

    echo "<script>window.open('view_student.php?update_error=unable to update data.Please try again','_self')</script>";
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     
}


}
}


?>
