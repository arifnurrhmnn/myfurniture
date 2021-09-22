<?php
    session_start();
    include "koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/img/icon/favicon.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

    <style>
        body {
            color: #fff;
            background: #19aa8d;
            font-family: 'Source Sans Pro', sans-serif;
            background: url(assets/img/bg-login-customer.jpg) no-repeat center center fixed;
            background-size: cover;
        }

        .form-control,
        .form-control:focus,
        .input-group-addon {
            border-color: #e1e1e1;
        }

        .form-control,
        .btn {
            border-radius: 5px;

        }

        .signup-form {
            width: 390px;
            margin: 0 auto;
            padding: 30px 0;
        }

        .signup-form form {
            color: #999;
            border-radius: 3px;
            margin-bottom: 15px;
            background: #fff;
            background-color: rgba(0, 0, 0, 0.8);
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 1px;
        }

        .signup-form h2 {
            color: white;
            font-weight: bold;
            margin-top: 0;
            text-align: center;
        }

        .signup-form p {
            text-align: center;
        }

        .signup-form hr {
            border: 1px solid #3498db;
        }

        .signup-form .form-group {
            margin-bottom: 20px;
        }

        .signup-form label {
            font-weight: normal;
            font-size: 13px;
        }

        .signup-form .form-control {
            min-height: 38px;
            box-shadow: none !important;
            background-color: rgba(105, 105, 105, 0.6);
            color: white;
            border: none;
        }

        .signup-form .input-group-addon {
            max-width: 42px;
            text-align: center;
            color: white;
            background-color: #3498db;
            border: none;
        }

        .signup-form .btn {
            font-size: 16px;
            font-weight: bold;
            background: #3498db;
            border: none;
            width: 100%;
        }

        .signup-form .btn:hover,
        .signup-form .btn:focus {
            background: #0e6caa;
            outline: none;
        }

        .signup-form a {
            color: #fff;
            text-decoration: underline;
        }

        .signup-form a:hover {
            text-decoration: none;
        }

        .signup-form form a {
            color: #3498db;
            text-decoration: none;
        }

        .signup-form form a:hover {
            text-decoration: underline;
        }

        .signup-form .fa {
            font-size: 21px;
        }

        .signup-form .fa-paper-plane {
            font-size: 18px;
        }

        .signup-form .fa-check {
            color: #fff;
            left: 17px;
            top: 18px;
            font-size: 7px;
            position: absolute;
        }

        .text-center a {
            color: #3498db;
        }

        .sosmed {
            height: auto;
            display: flex;
            flex-direction: row;
            justify-content: center;
        }

        .sosmed-items {
            color: #fff;
            width: 40px;
            height: 40px;
            font-size: 15px;
            margin-top: 3px;
            margin: 5px 5px;
            border-radius: 50%;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sosmed-items:hover {
            background-color: white;
        }

        .bg1 {
            background-color: #3b5998
        }

        .bg1:hover {
            color: #3b5998
        }

        .bg2 {
            background-color: #1da1f2
        }

        .bg2:hover {
            color: #1da1f2
        }

        .bg3 {
            background-color: #ea4335
        }

        .bg3:hover {
            color: #ea4335
        }

        .down {
            margin-top: 30px;
        }
    </style>
    <title>Log In</title>
</head>

<body>
    <div class="signup-form">
        <form action="" method="post">
            <h2>Log In</h2>
            <p>Please enter your account correctly!</p>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" class="form-control" name="u" placeholder="Username" id="username"
                        required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" class="form-control" id="password" name="p" placeholder="Password"
                        required="required">
                </div>
            </div>
            <div class="form-group">
                <div class="g-recaptcha" data-sitekey="6LeezsoUAAAAAC6Kg5VNk8OyNbC391MpJVvDz2Up"></div>
            </div>
            <div class="form-group text-right">
                <label class="forget"><a href="#">Forget Password?</a></label>
            </div>
            <button class="btn btn-primary btn-lg" name="login" id="submit">Login</button>
            <p class="c text-center">Or</p>
            <div class="sosmed">
                <div class="sosmed-items bg1"><i class="fa fa-facebook"></i></div>
                <div class="sosmed-items bg2"><i class="fa fa-twitter"></i></div>
                <div class="sosmed-items bg3"><i class="fa fa-google"></i></div>
            </div>
            <div class="form-group text-right down">
                <label class="forget"> Don't have an account? <a href="signup.php">Sign Up</a></label>
            </div>
        </form>
        <?php
        if (isset($_POST['login']))
        {
            $ambil = $db->query("SELECT * FROM tbl_pelanggan WHERE username = '" . $_POST['u'] . "' AND password = '" . $_POST['p'] . "'");
            $yangcocok = $ambil->num_rows;
            if ($yangcocok == 1)
            {
                $akun = $ambil->fetch_assoc();
                $_SESSION['pelanggan'] = $akun;

                echo "<script type='text/javascript'>swal('Selamat', 'Anda Berhasil Login', 'success');</script>";
                echo "<meta http-equiv='refresh' content='1;url=checkout.php'>";
            }
            else
            {
                echo "<script type='text/javascript'>swal('Login Gagal!', 'Username Dan Password Anda Salah', 'info');</script>";
            }
        }
        ?>
    </div>
</body>

</html>