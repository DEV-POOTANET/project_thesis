<?php 
include('../condb.php');
// echo "<pre>";
// print_r($_POST);
// print_r($_FILES);
// echo "</pre>";
// exit();


if (isset($_POST['thesis']) && $_POST['thesis']=="add") {

    session_start();
    $mem_id = $_SESSION['mem_id'];
    $thesis_date = date('Y-m-d');
    $thesis_topic = mysqli_real_escape_string($condb, $_POST['thesis_topic']);
    $thesis_description = mysqli_real_escape_string($condb, $_POST['thesis_description']);
    $thesis_keyword = mysqli_real_escape_string($condb, $_POST['thesis_keyword']);

    // อัปโหลดไฟล์
    $target_dir = "../assets/file/thesis/";
    $numrand = mt_rand(1, 100000);
    $file_name = $numrand . '_' . basename($_FILES["fileToUpload"]["name"]);
    $target_file = $target_dir . $file_name;
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ตรวจสอบว่าคือไฟล์ PDF หรือไม่
    if ($fileType != "pdf") {
        echo "ขออภัย, อนุญาตเฉพาะไฟล์ PDF เท่านั้น.";
        $uploadOk = 0;
    }

    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $sql = "INSERT INTO thesis ( thesis_topic, thesis_description, thesis_date, thesis_keyword, thesis_file, mem_id)
            VALUES ('$thesis_topic', '$thesis_description', '$thesis_date', '$thesis_keyword', '$file_name', '$mem_id')";
    

            $result = mysqli_query($condb, $sql) or die("Error in query: $sql " . mysqli_error($condb));

            if ($result) {
                echo "<script type='text/javascript'>";
                echo "window.location = 'user_list_thesis.php?user_thesis_add=user_thesis_add'; ";
                echo "</script>";
            } else {
               
            }
        } else {
            echo "ขออภัย, เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
        }
    }



} elseif (isset($_POST['thesis']) && $_POST['thesis']=="edit") {

	$thesis_topic = mysqli_real_escape_string($condb, $_POST['thesis_topic']);
    $thesis_description = mysqli_real_escape_string($condb, $_POST['thesis_description']);
    $thesis_keyword = mysqli_real_escape_string($condb, $_POST['thesis_keyword']);
    $thesis_id = mysqli_real_escape_string($condb, $_POST['thesis_id']);

	if (isset($_FILES['fileToUpload'])) {
        // ตรวจสอบว่าไฟล์มีค่าหรือไม่
        if ($_FILES['fileToUpload']['size'] > 0) {
             // อัปโหลดไฟล์
            $target_dir = "../assets/file/thesis/";
            $numrand = mt_rand(1, 100000);
            $file_name = $numrand . '_' . basename($_FILES["fileToUpload"]["name"]);
            $target_file = $target_dir . $file_name;
            $uploadOk = 1;
            $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // ตรวจสอบว่าคือไฟล์ PDF หรือไม่
            if ($fileType != "pdf") {
                echo "ขออภัย, อนุญาตเฉพาะไฟล์ PDF เท่านั้น.";
                $uploadOk = 0;
            }

            if ($uploadOk == 1) {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    $sql = "UPDATE thesis SET 
                    thesis_topic = '$thesis_topic',
                    thesis_description = '$thesis_description',
                    thesis_keyword = '$thesis_keyword',
                    thesis_file = '$file_name',
                    thesis_status = '0'
                WHERE thesis_id = '$thesis_id'";
    
                $result = mysqli_query($condb, $sql);
    

                    if ($result) {
                        echo "<script type='text/javascript'>";
                        echo "window.location = 'user_list_thesis.php?user_thesis_edit=user_thesis_edit'; ";
                        echo "</script>";
                    } else {
                    
                    }
                } else {
                    echo "ขออภัย, เกิดข้อผิดพลาดในการอัปโหลดไฟล์.";
                }
            }
        } else {
            // ไม่มีไฟล์ถูกส่งมา
            $sql = "UPDATE thesis SET 
                thesis_topic = '$thesis_topic',
                thesis_description = '$thesis_description',
                thesis_keyword = '$thesis_keyword',
                thesis_status = '0'
            WHERE thesis_id = '$thesis_id'";

            $result = mysqli_query($condb, $sql);

            
            if($result){
            echo "<script type='text/javascript'>";
            echo "window.location = 'user_list_thesis.php?user_thesis_edit=user_thesis_edit'; ";
            echo "</script>";
            }else{

            }

        }
    } 

    


}elseif (isset($_GET['thesis']) && $_GET['thesis']=="del"){ 

	$thesis_id  = mysqli_real_escape_string($condb,$_GET["thesis_id"]);
	$sql ="UPDATE thesis SET thesis_status = '3' WHERE thesis_id= $thesis_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'user_list_thesis.php?user_thesis__del=user_thesis__del'; ";
	echo "</script>";
    }

}elseif (isset($_GET['thesis']) && $_GET['thesis']=="status"){ 

	$thesis_id  = mysqli_real_escape_string($condb,$_GET["thesis_id"]);
    $thesis_status  = mysqli_real_escape_string($condb,$_GET["thesis_status"]);

	$sql ="UPDATE thesis SET thesis_status = $thesis_status  WHERE thesis_id= $thesis_id";
	$result = mysqli_query($condb, $sql) or die ("Error in query: $sql " . mysqli_error($condb). "<br>$sql");
	
	if($result){
	echo "<script type='text/javascript'>";
	echo "window.location = 'manage_thesis.php?admin_thesis_status0=admin_thesis_status0'; ";
	echo "</script>";
    }

}else{

}

?>