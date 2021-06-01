<?php
    include("../app/ini.php");
    include("../app/db.php");

    $select = "SELECT * FROM product";
    $res = mysqli_query($link, $select);

    $responseData = [];
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $responseData[] = $row;
        }
    }

    echo json_encode($responseData);

?>