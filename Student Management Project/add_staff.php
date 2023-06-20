<?php
include 'dbconnect1.php';
session_start();

if(isset($_POST['submit1'])){
$fname=mysqli_real_escape_string($conn,$_POST['fname']);
$lname=mysqli_real_escape_string($conn,$_POST['lname']);
$qual=mysqli_real_escape_string($conn,$_POST['qual']);
$exp=mysqli_real_escape_string($conn,$_POST['exp']);
$dept=mysqli_real_escape_string($conn,$_POST['dept']);
$email1=mysqli_real_escape_string($conn,$_POST['email1']);
$fathername=mysqli_real_escape_string($conn,$_POST['fathername']);
$birthdate=mysqli_real_escape_string($conn,$_POST['birthdate']);
$gender=mysqli_real_escape_string($conn,$_POST['gender']);
$city=mysqli_real_escape_string($conn,$_POST['city']);
$district=mysqli_real_escape_string($conn,$_POST['district']);
$nationality=mysqli_real_escape_string($conn,$_POST['nationality']);
$state=mysqli_real_escape_string($conn,$_POST['state']);
$mobile=mysqli_real_escape_string($conn,$_POST['mobile']);
$image = $_FILES['image']['name'];
$image_type = $_FILES['image']['type'];
$image_size = $_FILES['image']['size'];
$image_tmp = $_FILES['image']['tmp_name'];


if(!$image_type == 'image/jpg' or !$image_type == 'image/png'){
   $match_err="Invalid image formate";
}

else if($image_size<=10000){
   $size_error = "Image size is larger . Image size should be less than 10mb";

}

else{
   move_uploaded_file($image_tmp,"staff_image/$image");
   $sql="insert into staff_detail( fname,lname,qual,exp,dept,father_name,email1,mobile,birthdate,gender,district,city,state,nationality,photo) values('$fname','$lname','$qual','$exp','$dept','$fathername','$email1','$mobile','$birthdate','$gender','$district','$city','$state','$nationality','$image')";

$run=mysqli_query($conn,$sql);
if($run){
   $success="Student data submitted successfully";
}
else{
   $error="Unable to submit data . Please try again";
}
}
}
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
        <p class="text-center">Manage Staff</p>
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
<span class="text-center text-success font-weight-bold"><?php echo @$size_error; echo @$match_err  ?></span>

<h2 class="text-center text-dark pt-3 font-weight-bold">Student Management System</h2>
<div class="container bg-info" id="formsetting">
    <h3 class="text-center text-white pb-4 pt-3 font-weight-bold">Add Staff Details</h3>
    <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
        <div class="col-md-5 col-sm-5 col-12 m-auto">
            <div class="form-group">
                <label class="text-white">First Name</label>
                <input type="text" name="fname" placeholder="Enter Your First Name" class="form-control" required="required">
             </div>
             <div class="form-group">
                <label class="text-white">Qualification</label>
                <input type="text" name="qual" placeholder="Enter Your Qualification" class="form-control" required="required">
             </div>
             <div class="form-group">
                <label class="text-white">Department</label>
                <input type="text" name="dept" placeholder="Enter Your Department" class="form-control" required="required">
             </div><br>
             <div class="form-group">
                <label class="text-white">Gender</label>
                <input type="radio" name="gender" value="male" class="form-check-input ml-2">
                <label class="form-check-label text-white pl-4">Male</label>
                <input type="radio" name="gender" value="female" class="form-check-input ml-2">
                <label class="form-check-label text-white pl-4">Female</label>
             </div>
             <div class="form-group">
                <label class="text-white">Father Name</label>
                <input type="text" name="fathername" placeholder="Enter Your Father Name" class="form-control">
             </div>
            
             <div class="form-group">
                <label class="text-white">City</label>
                <input type="text" name="city" placeholder="Enter Your City" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">Natinality</label>
                <input type="text" name="nationality" placeholder="Enter Your Nationality" class="form-control">
             </div>
             <label class="text-white">Photo</label>
             <div class="input-group">
               <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                  <div class="custom-file">
                     <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describeby="inputGroupFileAddon01" name="image">
                     <label class="custom-file-label" for="inputGroupFile01">File name as staff name</label>
   </div>
   </div>
   </div>


        <div class="col-md-5 col-sm-5 col-12 m-auto">
        <div class="form-group">
                <label class="text-white">Last Name</label>
                <input type="text" name="lname" placeholder="Enter Your Last Name" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">Experience</label>
                <input type="text" name="exp" placeholder="Enter Your Experience" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">Email</label>
                <input type="email" name="email1" placeholder="Enter Your Email" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">Birthdate</label>
                <input type="date" name="birthdate" placeholder="Enter Your Birthday" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">Mobile</label>
                <input type="text" name="mobile" placeholder="Enter Your Mobile" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">District</label>
                <input type="text" name="district" placeholder="Enter Your District" class="form-control">
             </div>
             <div class="form-group">
                <label class="text-white">State</label>
                <input type="text" name="state" placeholder="Enter Your State" class="form-control">
             </div>
         

   <input type="submit" name="submit1" value="Add detail" class="btn btn-success px-5 mt-2">
   <span class="text-center text-dark font-weight-bold"><?php echo @$success; echo @$error  ?></span>
</div>
</form>  
</div>
</div>
</div>
     
</body>
</html>
