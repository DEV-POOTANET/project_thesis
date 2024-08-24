<?php 
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();


if (isset($_POST['faculties']) && $_POST['faculties']=="add") {

    $fac_name = mysqli_real_escape_string($condb,$_POST["fac_name"]);

    $sql = "INSERT INTO faculties
	(
	 fac_name
	)
	VALUES
	(
	'$fac_name'
	)";

    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");

	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_faculties.php?faculties_add=faculties_add'; ";
	echo "</script>";
	}else{
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_faculties.php?faculties_add_error=faculties_add_error'; ";
	echo "</script>";
	}



} elseif (isset($_POST['faculties']) && $_POST['faculties']=="edit") {

	$fac_id = mysqli_real_escape_string($condb,$_POST["fac_id"]);
	$fac_name = mysqli_real_escape_string($condb,$_POST["fac_name"]);

    $sql = "UPDATE faculties SET 
    fac_name = '$fac_name'
    WHERE fac_id='$fac_id'" ;

    $result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	

    if($result){
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_faculties.php?faculties_edit=faculties_edit'; ";
    echo "</script>";
    }else{
    echo "<script type='text/javascript'>";
    echo "window.location = 'list_faculties.php?faculties_edit_error=faculties_edit_error'; ";
    echo "</script>";
    }
    


}elseif (isset($_GET['faculties']) && $_GET['faculties']=="del"){ 

	$fac_id  = mysqli_real_escape_string($condb,$_GET["fac_id"]);
	$sql ="UPDATE faculties SET fac_status = '0' WHERE fac_id= $fac_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'list_faculties.php?faculties_del=faculties_del'; ";
	echo "</script>";
    }

}else{

}

?>