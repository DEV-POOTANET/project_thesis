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
  <link rel="icon" type="" href="../assets/img/logo/Logo-mut.png" />
  <!-- Font Awesome -->
 
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- iCheck for checkboxes and radio inputs -->
    
  <link rel="stylesheet" href="../assets/icheck-bootstrap.min.css">
  <!-- DataTables -->

  <link rel="stylesheet" href="../assets/dataTables.bootstrap4.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="../assets/adminlte.min.css">
  <!-- Select2 -->
  <link rel="stylesheet" href="../assets/select2.min.css">
  <link rel="stylesheet" href="../assets/select2-bootstrap4.min.css">



  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link href="https://fonts.googleapis.com/css?family=Kanit:400" rel="stylesheet">

  <link href="../assets/tagsinput.css?v=11" rel="stylesheet" type="text/css">

  <!-- ckeditor -->
  <script src="../assets/ckeditor.js"></script>

  <style>
    body {
      font-family: 'Kanit', sans-serif;
      
      font-size: 14px;
    }
  </style>


  <style type="text/css">
  @media print{
    .btn{
       display: none; /* ซ่อน  */
    }
  }
</style>
</head>
<?php


 
//print_r($_SESSION);
$mem_id = $_SESSION['mem_id'];
if($mem_id==''){
   Header("Location: ../index.php");
}

?>