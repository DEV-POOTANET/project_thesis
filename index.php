<?php session_start(); 

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>ระบบรวบรวมวิจัย</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" type="" href="assets/img/logo/Logo-mut.png " />
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

  
</head>
<style>
  .hold-transition{
    background-color: #0d6efd;
    /* background-image: url("assets/img/mut2.jpg"); */
    background-repeat: no-repeat;

     background-size: 100% ;
  }

body  {
  font-family: 'Kanit', sans-serif;    
  font-size: 14px;
  background-image: url("paper.gif");
  background-color: #222;
}

</style>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
   
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <center><img width="250 px" src="assets/img/logo/mutlogo.png"><br><br>
    <h3>เข้าสู่ระบบ</h3><h4>ระบบรวบรวมวิจัย</h4></center><br>
    

      <form action="chk_login.php" method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" name="user_username" id="user_username" placeholder="Username">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user text-primary"></span>
            </div>
          </div>
        </div>
        
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="user_password" id="user_password" placeholder="Password">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock text-primary"></span>
            </div>
          </div>
        </div>
        
        <div class="social-auth-links text-center mb-3">
          <button type="submit" class="btn btn-primary btn-block">Login</button>
      
        </div>
      </form>

      
      

      
    </div>
    <!-- /.login-card-body -->

  </div>

</div>
<!-- /.login-box -->
<?php
if (isset($_SESSION['error'])) {
    echo '<script>
            Swal.fire({
              title: "ERROR",
              text: "Username หรือ  Password ไม่ถูกต้อง",
              icon: "error",
              confirmButtonText: "ตกลง"
            });
          </script>';
    unset($_SESSION['error']);
}

if (isset($_SESSION['erroruser'])) {
  echo '<script>
          Swal.fire({
            title: "ERROR",
            text: " กรุณากรอก Username",
            icon: "error",
            confirmButtonText: "ตกลง"
          });
        </script>';
  unset($_SESSION['erroruser']);
}

if (isset($_SESSION['errorpass'])) {
  echo '<script>
          Swal.fire({
            title: "ERROR",
            text: " กรุณากรอก Password",
            icon: "error",
            confirmButtonText: "ตกลง"
          });
        </script>';
  unset($_SESSION['errorpass']);
}


if (isset($_SESSION['errorStatus'])) {
  echo '<script>
          Swal.fire({
            title: "ERROR",
            text: "บัญชีถูกระงับ หรือ โดนลบ โปรดติดต่อสำนักงานวิจัย",
            icon: "error",
            confirmButtonText: "ตกลง"
          });
        </script>';
  unset($_SESSION['errorStatus']);
}

?>

</body>


<!-- jQuery -->
<script src="assets/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="assets/bootstrap.bundle.min.js"></script>


</html>

