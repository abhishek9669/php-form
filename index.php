<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </head>
    <style>
        .a1{
            margin:auto;
            width: 800px;
            height: 700px;
            background: pink;
        }
    </style>
    <body>
        <?php
        if (isset($_GET['registration'])) {

            //echo 'yes';

            $cn = mysqli_connect('localhost','root','','registration_db');

            $name =  mysqli_real_escape_string($cn,$_GET['name']);
            $email =  mysqli_real_escape_string($cn,$_GET['email']);
            $pass =  mysqli_real_escape_string($cn,$_GET['pass']);
            $cpass =  mysqli_real_escape_string($cn,$_GET['cpass']);
            $dob =  mysqli_real_escape_string($cn,$_GET['dob']);
            $monomber =  mysqli_real_escape_string($cn,$_GET['monomber']);

            if ($pass == $cpass) {
                $pass = md5($pass);

                $sql = "INSERT INTO users(`user_name`,`user_email`,`password`,`dateofborth`,`mo_no`)VALUE('$name','$email','$pass','$dob','$monomber')";

                mysqli_query($cn,$sql);


                mysqli_close($cn);            }
        }
        ?>
        <div class="a1">

        
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="GET" class="offset-3 w-50">
            <h1 class="text-center">Registration FORM</h1>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp" required>
                <div id="emailHelp" class="form-text"></div>
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Password</label>
                <input type="password" name="pass" class="form-control" id="pass" required>
            </div>
            <div class="mb-3">
                <label for="cpass" class="form-label">Confirm Password</label>
                <input type="password" name="cpass" class="form-control" id="cpass" required >
            </div>
            <div class="mb-3">
                <label for="dob" class="form-label">Date Of Birth</label>
                <input type="date" name="dob" class="form-control" id="dob" required>
            </div>
            <div class="mb-3">
                <label for="mobno" class="form-label">Mobile Number</label>
                <input type="number" name="monomber" class="form-control" id="mobno" required>
            </div>
          
            <input type="submit" name="registration" value="Register Now" class="btn btn-primary" />
        </form>
        </div>
        
    </body>
</html>