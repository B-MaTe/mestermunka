<?php
    include("../app/ini.php");
    include("../app/db.php");

    $select = "SELECT * FROM counter";
    $res = mysqli_query($link, $select);

    $counterData = [];
    if (mysqli_num_rows($res)) {
        while ($row = mysqli_fetch_assoc($res)) {
            $counterData[] = $row;
        }
    }

    echo json_encode($counterData);


    
?>