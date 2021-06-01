<?php

    if(isset($_POST['id'])) {
        include("../app/ini.php");
        include("../app/db.php");
        
        $deleteSelect = "SELECT * FROM munkaink WHERE id = " . $_POST['id'];
        $delRes = mysqli_query($link, $deleteSelect);

        if (mysqli_num_rows($delRes)) {
            while ($delRow = mysqli_fetch_object($delRes)) {
                $sku = $delRow->sku;
            }
            unlink("../assets/img/munkaink/" . $sku . ".jpg");
        }

        $delete = "DELETE FROM munkaink WHERE id = " . $_POST['id'];
        $res = mysqli_query($link, $delete);


        echo json_encode(['res' => 'ok']);
    }
?>