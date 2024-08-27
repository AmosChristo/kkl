<?php
include 'koneksi.php';
include 'helper.php';
session_start();
$msg = "";

if (isset($_SESSION['user'])) {
    header('location:' . base_url('system/'));
    exit();
}

if (isset($_POST['login'])) {
    $email = test_input($_POST['email']);
    $password = test_input($_POST['password']);
    // $captcha_form = test_input($_POST['captcha_code']);
    // $captcha_sesi = $_SESSION['captcha_code'];

    //cek user login 
    $ambil = $koneksi->query("select * from users where email='$email'");
    $ketemu = $ambil->num_rows;
    $data_login = $ambil->fetch_assoc();

    // if ($captcha_form == $captcha_sesi) {
    if ($ketemu == 1) {
        if (password_verify($password, $data_login['password'])) {
            $_SESSION['user'] = $data_login;
            (isset($_POST['remember'])) ? set_cookie('email', $data_login['email'], 1) : unset_cookie('email');
            $msg = "<div class='alert alert-success text-center'>Login Sukses</div>";
            echo "<meta http-equiv='refresh' content='1;url=" . base_url('system/') . "'";
        } else {
            $msg = "<div class='alert alert-danger text-center'>Email atau Password Salah</div>";
            echo "<meta http-equiv='refresh' content='1;url=login'";
        }
    } else {
        $msg = "<div class='alert alert-danger alert-dismissible'>Email atau Password Salah<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
        <span class='text-white' aria-hidden='true'>&times;</span>
      </button></div>";
    }
    // } else {
    //     $msg = "<div class='alert alert-danger text-center'>Captcha Tidak Cocok!!</div>";
    //     echo "<meta http-equiv='refresh' content='1;url=login'";
    // }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link rel="icon" type="image/x-icon" href="<?= base_url(); ?>assets/img/<?= $data['favicon']; ?>">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="<?= base_url(); ?>" class="h1">Ratih<b>SOUVENIR</b></a>
            </div>
            <div class="card-body">

                <?= $msg; ?>

                <form method="POST" action="<?= htmlspecialchars($_SERVER["PHP_SELF"]); ?>" class="needs-validation" novalidate>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                        <input type="email" class="form-control" placeholder="Email" name="email" required autofocus>
                        <div class="invalid-feedback">
                            Harap masukan email
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                        <div class="invalid-feedback">
                            Harap masukan password
                        </div>
                    </div>
                    <!-- <div class="input-group mb-3">
                        <img src="captcha.php">
                        <input type="text" class="form-control" placeholder="Captcha" name="captcha_code" required>
                        <div class="invalid-feedback">
                            Harap masukan captcha
                        </div>
                    </div> -->
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" id="remember" name="remember">
                                <label for="remember">
                                    Remember Me
                                </label>
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block" name="login">Login</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/adminlte.min.js"></script>
    <script src="../dist/js/script.js"></script>

</body>

</html>