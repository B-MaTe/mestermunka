<?php
    $_SERVER['REQUEST_METHOD'] = "POST";
    include("../app/ini.php");
    include("../app/db.php");
    include("../app/function.php");
    $id = $_POST['id'];
    $select = "SELECT sku,pictures FROM product WHERE id =" . $id;
    $res = mysqli_query($link, $select);
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_object($res)) {
            $sku = $row->sku;
            $numberOfPics = (int)$row->pictures + 1;
        }
    }

 
    //Stores the filename as it was on the client computer.
    $imagename =$_FILES['file']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['file']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['file']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['file']['tmp_name'];
    //The path you wish to upload the image to
    $imagePath = "../images/" . $sku . "/";
    if (!is_dir($imagePath)) {
        mkdir($imagePath);
    }

    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            $original = imagecreatefromjpeg($imagePath . $imagename);
            $size = getimagesize($imagePath . $imagename);
            $resized = imagecreatetruecolor(1200, 1486);
            imagecopyresampled($resized, $original, 0, 0, 0, 0, 1200, 1486, $size[0], $size[1]);
            if (imagejpeg($resized, "../images/" . $sku . "/" . "product" . $numberOfPics . ".jpg")) {
                unlink($imagePath . $imagename);
                $sqlUpdate = "UPDATE product SET pictures = pictures + 1 WHERE id =" . $id;
                $sql = mysqli_query($link, $sqlUpdate);
                echo "Sussecfully uploaded your image.";
            }
            
           
            
            
            
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }
?>