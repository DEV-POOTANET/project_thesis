
<?php 
// echo "<pre>";
// print_r($_POST);
// echo "<pre>";
// exit();

session_start();
if($_POST['user_username']==null){
  $_SESSION['erroruser']="erroruser";
  Header("Location: index.php");
}
elseif($_POST['user_password']==null){
  $_SESSION['errorpass']="errorpass";
  Header("Location: index.php");
}
elseif(isset($_POST['user_username'])){
          include("condb.php");

          $user_username = mysqli_real_escape_string($condb,$_POST['user_username']);
          $user_password = mysqli_real_escape_string($condb,sha1($_POST['user_password']));

          $chk = trim($user_username) OR trim($user_password);
          if($chk==''){
            $_SESSION['error']="error";
              echo "<script> window.location='index.php'</script>";
            }//close if chk trim
            else{
            //query 
                      $sql="SELECT * FROM member
                      WHERE mem_username='".$user_username."' 
                      AND mem_password='".$user_password."' ";
                      $result = mysqli_query($condb,$sql);
                    
                      if(mysqli_num_rows($result)==1){
                          $row = mysqli_fetch_array($result);
                          if($row["mem_status"]=="0" or $row["mem_status"]=="2" ){
                            $_SESSION['errorStatus']="errorStatus";
                            Header("Location: index.php");
                          }else{
                            $_SESSION["mem_id"] = $row["mem_id"];
                            $_SESSION["mem_name"] = $row["mem_name"];
                            $_SESSION["mem_lev"] = $row["mem_level"];
                            $_SESSION["mem_img"] = $row["mem_img"];
                            
                            // print_r($_SESSION);
                            // var_dump($_SESSION);
                            // exit();
                            if($_SESSION["mem_lev"]=="0"){ 
                              // echo "Are Your Admin";
                              // exit();
                              Header("Location: site/");

                            }
                            elseif($_SESSION["mem_lev"]=="1"){  

                              Header("Location: site/");
                            }
                          }
                          
                      }else{
                        $_SESSION['error']="error";
                        echo "<script> window.location='index.php'</script>";
                      }
            }//close else chk trim
            //exit();
}else{
      Header("Location: index.php"); //user & user_password incorrect back to login again
}
?>