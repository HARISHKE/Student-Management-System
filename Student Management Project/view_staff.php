<?php
include 'dbconnect1.php';
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
    <button class="btn btn-outline-light bg-info mt-3" id="toggler">
        <i class="fa fa-bars"></i>
</button>
<section id="main-form">
    <h3 class="text-center text-success"><?php echo @$_GET['update_success']; echo @$_GET['update_error']; echo @$_GET['delete_msg']; ?></h3>
<h2 class="text-center text-dark pt-3 font-weight-bold">Student Management System</h2>
<div class="container bg-info" id="formsetting">
    <h3 class="text-center text-white pb-4 pt-3 font-weight-bold">View Staff Details</h3>
<div class="row">
    <div class="col-md-12 col-sm-12 col-12">
        <table class="table table-bordered text-white table-responsive"> 
            <thead>
                <tr>
                    <th>SNO.</th>
                    <th>Firstname.</th>
                    <th>Lastname.</th> 
                    <th>Qualification.</th> 
                    <th>Experience.</th> 
                    <th>Department.</th> 
                    <th>Fathername.</th>
                    <th>Gender.</th>
                    <th>Email.</th>
                    <th>Birthdate.</th>
                    <th>Mobile.</th>
                    <th>City.</th>
                    <th>District.</th>
                    <th>State.</th>
                    <th>Nationality.</th>
                    <th>Photo.</th>
                    <th>Action.</th>
                </tr>
            </thead>
            <?php
            $sql="select * from staff_detail";
            $run=mysqli_query($conn,$sql);
            $i=1;
            while($row=mysqli_fetch_assoc($run))
            {
                 
         
            ?>
            <tbody>
                <tr>
                    <td> <?php echo $i++; ?></td>
                    <td> <?php echo $row['fname'] ?></td>
                    <td> <?php echo $row['lname'] ?></td>
                    <td> <?php echo $row['qual'] ?></td>
                    <td> <?php echo $row['exp'] ?></td>
                    <td> <?php echo $row['dept'] ?></td>
                    <td> <?php echo $row['father_name'] ?></td>
                    <td> <?php echo $row['gender'] ?></td>
                    <td> <?php echo $row['email1'] ?></td>
                    <td> <?php echo $row['birthdate'] ?></td>
                    <td> <?php echo $row['mobile'] ?></td>
                    <td> <?php echo $row['city'] ?></td>
                    <td> <?php echo $row['district'] ?></td>
                    <td> <?php echo $row['state'] ?></td>
                    <td> <?php echo $row['nationality'] ?></td>
                    <td>
                        <a href="staff_image/<?php echo $row['photo']; ?>">
                        <img src="staff_image/<?php echo $row['photo']; ?>" width="50" height="50"></a>
                    </td>

                    <td>
                        
                    <a style="color:white; text-decoration:none;" href="edit_staff.php?edit_staff=<?php echo $row['staff_id']; ?>">Edit</a> |
                    <a style="color:white; text-decoration:none;" href="delete_staff.php?delete_staff=<?php echo $row['staff_id']; ?>">Delete</a>
                    
                    </td>



                </tr>
            </tbody> 
            <?php } ?>

        </table>

    </div>
</div>
</div>
</section>
 
</div> 
</div>
     
</body>
</html>
