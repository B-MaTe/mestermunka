<?php
    include("../app/ini.php");
    include("../app/db.php");

    function getProductUrlName($name) {
        $from = [' ','á','ó','ü','ű','ő','ö','í','é','ú'];
        $to = ['-','a','o','u','u','o','o','i','e','u'];
        if ($name[-1] === " ") {
            $name = substr($name, 0, strlen($name)-1);
        }

        return strtolower(str_replace($from,$to,$name));
    }

    if (isset($_POST['id'])) {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $sku = getProductUrlName($_POST['name']);
        $price = $_POST['price'];
        $category = $_POST['category'];
        $color = $_POST['color'];
        $size = $_POST['size'];
        $discount = $_POST['discount'];
        $discountTime = $_POST['discountTime'];
        $desc = $_POST['description'];
        $pictures = $_POST['pictures'];
        $stock = $_POST['stock'];

        if ($id == 0) {
            $insert =   "INSERT INTO product (  
                                                name,
                                                sku,
                                                price,
                                                category,
                                                color,
                                                size,
                                                discount, 
                                                discountTime, 
                                                description, 
                                                product_status, 
                                                pictures, 
                                                sold, 
                                                stock, 
                                                rating, 
                                                countOfRatings
                                                ) 
                        VALUES (
                                '$name',
                                '$sku',
                                '$price',
                                '$category',
                                '$color',
                                '$size',
                                '$discount', 
                                '$discountTime', 
                                '$description', 
                                1, 
                                '$pictures', 
                                0, 
                                '$stock', 
                                0, 
                                0
                            )";
            $res = mysqli_query($link, $insert);

            $id = mysqli_insert_id($link);
        } else {
            $update = "UPDATE product SET   name='" . $name . "',
                                            sku='" . $sku . "',
                                            price='" . $price . "',
                                            category='" . $category . "',
                                            color='" . $color . "',
                                            size='" . $size . "',
                                            discount='" . $discount . "',
                                            discountTime='" . $discountTime . "',
                                             description='" . $desc . "',
                                             pictures='" . $pictures . "',
                                              stock='" . $stock . "'
                     WHERE id=" . $id;

            $res = mysqli_query($link, $update);
        }
        

        $select = "SELECT * FROM product WHERE id =" . $id;
        $res = mysqli_query($link, $select);
        $row = mysqli_fetch_assoc($res);

        echo json_encode(['res' => 'ok','row' => $row]);
    }
?>