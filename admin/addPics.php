


<?php
    include("../app/ini.php");
    include("../app/db.php");

    



    $id = $_POST['id'];


    

    $select = "SELECT * FROM munkaink WHERE id =" . $id;
    $res = mysqli_query($link, $select);
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_object($res)) {
            $sku = $row->sku;
        }
    }
    $image = $_POST['file'][0];
    //Stores the filename as it was on the client computer.
    $imagename = $_FILES['file']['name'];
    //Stores the filetype e.g image/jpeg
    $imagetype = $_FILES['file']['type'];
    //Stores any error codes from the upload.
    $imageerror = $_FILES['file']['error'];
    //Stores the tempname as it is given by the host when uploaded.
    $imagetemp = $_FILES['file']['tmp_name'];

    //The path you wish to upload the image to
    $imagePath = "../assets/img/munkaink/";
    if(is_uploaded_file($imagetemp)) {
        if(move_uploaded_file($imagetemp, $imagePath . $imagename)) {
            rename("../assets/img/munkaink/" . $imagename, "../assets/img/munkaink/" . $sku . ".jpg");
            echo "Sussecfully uploaded your image.";
        }
        else {
            echo "Failed to move your image.";
        }
    }
    else {
        echo "Failed to upload your image.";
    }
?>