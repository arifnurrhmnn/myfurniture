<?php
    session_start();
    include "../koneksi.php";
?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="assets/icons/font-awesome/css/font-awesome.min.css">
    <link rel="shortcut icon" href="assets/images/favicon.png">
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/sweetalert.min.js"></script>

    <style>
        body {
            color: rgb(241, 241, 241);
            background: #19aa8d;
            font-family: 'Source Sans Pro', sans-serif;
            background: url(assets/images/bg-login-admin.jpg) no-repeat center center fixed;
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
            margin-top: 120px;

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
                <label class="checkbox-inline">
                    <input type="checkbox" /> Remember me
                </label>
            </div>
            <div class="form-group">
                 <button class="btn btn-primary btn-lg" name="login" id="submit">Login</button>
            </div>
        </form>
        <?php
                            if (isset($_POST['login'])) 
                            {
                                $ambil = $db->query("SELECT * FROM tbl_admin WHERE username = '".$_POST['u']."' AND password = '".$_POST['p']."'");
                                $yangcocok = $ambil ->num_rows;
                                if ($yangcocok==1) {
                                    $_SESSION['tbl_admin']=$ambil->fetch_assoc();
                                    echo "<script> swal('', 'Login Berhasil', 'success');</script>";
                                    echo "<meta http-equiv='refresh' content='1;url=index.php'>";
                                } 
                                else{
                                    echo "<script> swal('', 'Login Gagal', 'warning');</script>";
                                    echo "<meta http-equiv='refresh' content='1;url=login.php'>";
                                }
                            }
                        ?>
                    </div>
    </div>
</body>

</html>