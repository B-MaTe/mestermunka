<?php
    include("../app/ini.php");
    include("../app/db.php");

    function getProductUrlName($name) {
        $from = [' ','á','ó','ü','ű','ő','ö','í','é','ú'];
        $to = ['-','a','o','u','u','o','o','i','e','u'];

        return strtolower(str_replace($from,$to,$name));
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sku = getProductUrlName($_POST['name']);
        $desc = $_POST['description'];
        $date = $_POST['date'];

        if ($id == 0) {
            $insert = "INSERT INTO product (name, sku, description, date) VALUES ('$name', '$sku', '$desc', '$date')";
            $res = mysqli_query($link, $insert);

            $id = mysqli_insert_id($link);
        } else {
            $update = "UPDATE product SET name='" . $name . "', sku='" . $sku . "', description='" . $desc . "', date='" . $date . "' WHERE id=" . $id;
            $res = mysqli_query($link, $update);
        }
        

        $select = "SELECT * FROM product WHERE id =" . $id;
        $res = mysqli_query($link, $select);
        $row = mysqli_fetch_assoc($res);

        echo json_encode(['res' => 'ok','row' => $row]);
    }
?>