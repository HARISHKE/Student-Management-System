<?php
include 'dbconnect1.php';

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
<link rel="stylesheet" href="style4.css">
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
        <a href="add_student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-user"></i>Add Student Details</a> 
        <a href="view_student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-eye"></i>View Student Details</a> 
        <a href="edit_student.php" class="list-group-item list-group-item-action">
        <i class="fa fa-pencil"></i>Edit Student Details</a> 
        <a href="logout.php" class="list-group-item list-group-item-action">
        <i class="fa fa-sign-out"></i>Logout</a>  
</ul>
</div>
<div class="main-body">
    <button class="btn btn-outline-light bg-info mt-3" id="toggler">
        <i class="fa fa-bars"></i>
</button>
<section>
<h2 class="text-center text-dark pt-3 font-weight-bold">Student Management System</h2>
<div class="container bg-info" id="formsetting">
    <h3 class="text-center text-white pb-4 pt-3 font-weight-bold">Welcome to Dashboard</h3>
<div class="row"> 
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="add_staff.php" class="text-white text-center"><i class="fa fa-user"></i>
        <h3>Add Student Details</h3></a>
</div>
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="view_student.php" class="text-white text-center"><i class="fa fa-eye"></i>
        <h3>View Student Details</h3></a>
</div>
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="edit_student.php" class="text-white text-center"><i class="fa fa-pencil"></i>
        <h3>Edit Student Details</h3></a>
</div>
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="add_staff.php" class="text-white text-center"><i class="fa fa-user"></i>
        <h3>Add Staff Details</h3></a>
</div>
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="view_staff.php" class="text-white text-center"><i class="fa fa-eye"></i>
        <h3>View Staff Details</h3></a>
</div>
<div class="col-md-4 col-sm-4 col-12 m-auto icon">
        <a href="edit_staff.php" class="text-white text-center"><i class="fa fa-pencil"></i>
        <h3>Edit Staff Details</h3></a>
</div>
</section>

</div>
</div>
     
</body>
</html>
