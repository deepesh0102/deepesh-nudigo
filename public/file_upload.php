<?php 
//include_once("db_connect.php");
if(!empty($_FILES)){
    $upload_dir = "uploads/";
    $fileName = time().$_FILES['file']['name'];
    $uploaded_file = $upload_dir.$fileName;    
    if(move_uploaded_file($_FILES['file']['tmp_name'],$uploaded_file)){

            echo 'image uploaded successfully!!';
    }   
}
