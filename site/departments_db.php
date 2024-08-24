<?php 
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();


if (isset($_POST['departments']) && $_POST['departments']=="add") {

    $dep_name = mysqli_real_escape_string($condb,$_POST["dep_name"]);
    $dep_fac_id = mysqli_real_escape_string($condb,$_POST["dep_fac_id"]);


    $sql = "INSERT INTO departments
	(
	 dep_name,
     dep_fac_id
	)
	VALUES
	(
	'$dep_name',
    '$dep_fac_id'
	)";

    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_departments.php?departments_add=departments_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_departments.php?departments_add_error=departments_add_error'; ";
	echo "</script>";
	}



} elseif (isset($_POST['departments']) && $_POST['departments']=="edit") {

	$dep_id = mysqli_real_escape_string($condb,$_POST["dep_id"]);
	$dep_name = mysqli_real_escape_string($condb,$_POST["dep_name"]);
	$dep_fac_id = mysqli_real_escape_string($condb,$_POST["dep_fac_id"]);


    $sql = "UPDATE departments SET 
    dep_name = '$dep_name',
    dep_fac_id = '$dep_fac_id'
    WHERE dep_id='$dep_id'" ;

    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	

    if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_departments.php?departments_edit=departments_edit'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_departments.php?departments_edit_error=departments_edit_error'; ";
    echo "</script>";
    }
    


}elseif (isset($_GET['departments']) && $_GET['departments']=="del"){ 

	$dep_id  = mysqli_real_escape_string($condb,$_GET["dep_id"]);
	$sql ="UPDATE departments SET dep_status = '0' WHERE dep_id= $dep_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_departments.php?departments_del=departments_del'; ";
	echo "</script>";
    }

}else{

}

?>