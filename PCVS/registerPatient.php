<?php
require('connect_db.php');
session_start();

$error = '';
$validate = '';

if (isset($_POST['submit'])) {
    $username   = $_POST['username'];
    $password   = $_POST['password'];
    $repass     =$_POST['repass'];
    $fullName   = $_POST['fullName'];
    $email      = $_POST['email'];
    $ICPassport = $_POST['ICPassport'];

    mysqli_query($connect, "INSERT INTO patient VALUES('', 'username', 'password', 'fullName', 'email', 'ICPassport')") or die(mysqli_error($connect));

    echo "<div align='center'><h5> Saving Data.... </h5></div>";
    echo "<meta http-equiv='refresh' content='1;url=http://localhost/PCVS/login.php'>";

    if(!empty(trim($username)) && !empty(trim($password)) && !empty(trim($repass)) && !empty(trim($fullName)) && !empty(trim($email)) && !empty(trim($ICPassport))){
        if ($password == $repass) {
            if (check_uname($fullName, $connect)==0) {
                $pass = password_hash($password, PASSWORD_DEFAULT);
                $query = "INSERT INTO patient (username,password,fullName,email,ICPassport) VALUES ('$username','$password','$fullName','$email','$ICPassport')";
                $result = mysqli_query($connect,$query);

                if ($result) {
                       $_SESSION['username'] = $username;

                       //header('Location: index.php');
                   }else{
                        $error = 'Patient Register Failed!';
                   }
            }else{
                $error = 'Username has been registered!';
            }
        }else{
            $validate = 'Password are not same!';
        }
    }else{
        $error = 'Data can not be empty!';
    }
}

function check_uname($username,$connect){
    $uname = mysqli_real_escape_string($connect,$_GET['username']);
    $query =  "SELECT * FROM patient WHERE username'$uname'";
    if ($result=mysqli_query($connect,$query)) return mysqli_num_rows($result);
}

?> 


<!DOCTYPE html>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Register Patient</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous"> 
     
    <!-- costum css -->
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <section class="container-fuild mb-4">
        <section class="row justify-content-center">
        <section class="col-12 col-sm-6 col-md-4">
            <form class="form-container" action="registerPatient.php" method="POST">
                <h4 class="text-center font-weight-bold"> Sign-Up </h4>
                <?php if($error != ''){ ?>
                        <div class="alert alert-danger" role="alert"><?= $error; ?></div>
                <?php } ?>

                <div class="form-group">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username" placeholder="Input Username">
                </div>

                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                    <?php if($validate != '') {?>
                        <p class="text-danger"><?= $validate; ?></p>
                    <?php }?>
                </div>

                <div class="form-group">
                    <label for="password">Re-Password</label>
                    <input type="password" class="form-control" id="password" name="repass" placeholder="Re-Password">
                    <?php if($validate != '') {?>
                        <p class="text-danger"><?= $validate; ?></p>
                    <?php }?>
                </div>

                <div class="form-group">
                    <label for="fullName">fullName</label>
                    <input type="text" class="form-control" id="fullName" name="fullName" placeholder="Input Full Name">
                </div>

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Input Email">
                </div>

                <div class="form-group">
                    <label for="ICPassport">ICPassport</label>
                    <input type="text" class="form-control" id="ICPassport" name="ICPassport" placeholder="Input IC Passport">
                </div>

                <button type="submit" name="submit" class="btn btn-primary btn-block">Register</button>
                <div class="form-footer mt-2">
                    <p> Already have Account? <a href="login.php">Login</a></p>
                </div>
            </form>
        </section>
        </section>
    </section>

</body>
</html>

