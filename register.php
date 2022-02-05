<?php
    include("connection.php");     // conect with database

    $name = $_POST['name'];         // collect the data from froenend
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $address = $_POST['address'];
    $photo = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['tmp_name'];
    $role = $_POST['role'];

    if($cpassword!=$password){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "../routes/register.html";
            </script>';
    }
    else{
        move_uploaded_file($tmp_name,"../uploades/$photo");     // uploads the img in upload folder after get from user
        $insert = mysqli_query($connect, "insert into user (name, mobile, password, address, photo, status, votes, role) values('$name', '$mobile', '$password', '$address', '$photo', 0, 0, '$role') ");   // insert the data in data base
        if($insert){
            echo '<script>
                    alert("Registration successfull!");
                    window.location = "../";
                </script>';
        }
    } 
    
?>