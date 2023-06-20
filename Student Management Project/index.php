<?php
include 'dbconnect.php';
$email_err=$pws_err=$success=$error='';
if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $pass=password_hash($password, PASSWORD_BCRYPT);
    $cpass=password_hash($cpassword, PASSWORD_BCRYPT);

    $query="select * from register where email='$email'";
    $run=mysqli_query($conn,$query);
    $row=mysqli_num_rows($run);
    if($row>0){
        $email_err="Email id already exists.Please try with another email";

    }
    else if($password !== $cpassword){
        $pws_err="Your password do not match";

    }
    else{
        $sql="insert into register(fname,email,password,cpassword) values('$fname','$email','$pass','$cpass')";
        $run=mysqli_query($conn,$sql);
        if($run){
            $success="Registered successfully";
        }
        else{
           $error="Unable to submit data.Please try again....."; 
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Student Management System</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.3/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">
<script>
    function content1(){
        document.getElementById("div1").style.display="block";
        document.getElementById("div2").style.display="none";
    }
    function content2(){
        document.getElementById("div1").style.display="none";
        document.getElementById("div2").style.display="block";
    }
</script>
</head>
<body>
<section class="formsetting">
    <p class="text-center text-warning font-weight-bold"><?php echo @$_SESSION['login_first']; ?></p>
    
   
  <div class="text-right btn-lg">  
<a href="index1.php" class="btn btn-primary px-5 ">Staff</a> 
</div>

    <h2 class="text-center text-dark pt-1x pb-1 font-weight-bold">Student Management System</h2>
     <p class="text-center font-weight-bold text-danger"><?php echo @$_GET['error']; ?></p>
    <div class="container bg-info" id="formsetting">
        <h3 class="text-light text-center py-3">Student</h3>
        
        <div class="row">
            <div class="col-md-7 col-sm-7 col-12">
            <img src="image/a.jpg" class="img-fluid">
            </div>
            <div class="col-md-5 col-sm-5 col-12">

                <button class="btn btn-danger px-5" onclick="content1()">Register</button>
                <button class="btn btn-danger px-5" onclick="content2()">Login</button>

                <div id="div1" style="display:block" class="mt-4">
            
                <form method="post" action="">
                    <div class="form-group">
                        <label class="text-white">Full name</label>
                        <input type="text" name="fname" placeholder="Enter your name" class="form-control" required="required">
                         
                    </div>
                     <div class="form-group">
                        <label class="text-white">Email</label>
                        <span class="float-right text-white font-weight-bold"><?php echo $email_err; ?></span>
                        <input type="text" name="email" placeholder="Enter your email" class="form-control" required="required">
                         
                    </div>
                    <div class="form-group">
                        <label class="text-white">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" required="required">
                         
                    </div>
                    <div class="form-group">
                        <label class="text-white">Confirm Password</label>
                        <span class="float-right text-white font-weight-bold"> <?php echo $pws_err; ?></span>
                        <input type="password" name="cpassword" placeholder="Re-Enter your password" class="form-control" required="required">
                         
                    </div>

                    <input type="submit" name="submit" value="Register" class="btn btn-success px-5">
                    <span class="float-right text-white font-weight-bold"> <?php echo $success; echo $error; ?></span>
                </form>
                </div>

                <div id="div2" style="display:none;" class="mt-4">
                <form method="post" action="">
                <div class="form-group">
                        <label class="text-white">Email</label>
                        <input type="text" name="email" placeholder="Enter your email" class="form-control" required="required">
                         
                    </div>
                    <div class="form-group">
                        <label class="text-white">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" class="form-control" required="required">
                         
                    </div>
                    <input type="submit" name="submit1" value="Login" class="btn btn-success px-5">

                </div>
                
            </div>   

            </div>

        </div>

     </div>
</section>
</body>
</html>

<?php

if (isset($_POST['submit1'])){

    $email=$_SESSION['email']=$_POST['email'];
    $pwd=$_POST['password'];
    $sql="select * from register where email='$email'";
    $run=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($run);
    $pwd_fetch=$row['password'];
    $pwd_decode=password_verify($pwd,$pwd_fetch);
    if($pwd_decode){
        echo "<script>window.open('add_student.php?success=Logged in successfully','_self')</script>";
    }
else
{
echo "<script>window.open('index.php?success=Username or password is incorrect','_self')</script>";


}
}

?>