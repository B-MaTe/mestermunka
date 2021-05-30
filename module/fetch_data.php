<?php
include("../app/function.php");
//var_dump($_POST);

if(isset($_POST["action"]))
{
 $query = "
  SELECT * FROM product WHERE product_status = '1'
 ";
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= "
   AND price BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'
  ";
 }
 
 if(isset($_POST["category"]))
 {
     if (!in_array('all', $_POST["category"])) {
        $category_filter = implode("','", $_POST["category"]);
        $query .= "
        AND category IN('".$category_filter."')
        ";
     } 
 }
 
 if(isset($_POST['color']))
 {
     
    if (!in_array('all', $_POST["color"])) {
        $color_filter = implode("','", $_POST["color"]);
        $query .= "
        AND color LIKE '%$color_filter%'";
    }
 }
 if(isset($_POST["sortby"])) {
    if (!in_array('all', $_POST["sortby"])) {
    $sortBy = implode("','", $_POST["sortby"]);
    $query .= "
    ORDER BY " . groupBy($sortBy);
    }
}
 echo '<div class="row">';

include("../app/ini.php");
include("../app/db.php");

//var_dump($query);
$res = mysqli_query($link, $query);
if (mysqli_num_rows($res)) {
    while ($row = mysqli_fetch_object($res)) {
        $id = $row->id;
        if ((int)$row->discount && ($row->discountTime == 0 || $row->discountTime >= date("Y-m-d"))) {
            $price = webshopNumberFormat($row->discount) . " FT.-";
            $origPrice = webshopNumberFormat($row->price) . " FT.-";
        } else {
            $price = webshopNumberFormat($row->price) . " FT.-";
            $origPrice = NULL;
        }
?>
                    <div class="col-sm-6 col-md-4 col-lg-3 p-b-35">
                        <!-- Block2 -->
                        <div class="block2">
                            <div class="block2-pic hov-img0">
    
                                <img src="images/product<?php echo $id; ?>.jpg" alt="IMG-PRODUCT">
                                
                                <a href="/item?id=<?php echo $id ?>" class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04">
                                    Részletek
                                </a>
                            </div>
    
                            <div class="block2-txt flex-w flex-t p-t-14">
                                <div class="block2-txt-child1 flex-col-l ">
                                    <a href="/item?id=<?php echo $id ?>" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
                                        <?php echo $row->name; ?>
                                    </a>
    
                                    <span class="stext-105 cl3">
                                    <ins><?php echo $price; ?></ins> &nbsp; &nbsp;  <del><?php echo $origPrice; ?></del>
                                    </span>
                                    <span class="fs-18 cl11">
													<?php 
                                                    $csillag = 0;
													for ($i = 0; $i < round($row->rating / $row->countOfRatings);$i++) {
                                                        $csillag++;
														echo '<i class="zmdi zmdi-star p-r-2"></i>';
													}
                                                    for ($i = 0; $i < 5 - $csillag; $i++) {
                                                        echo  '<i class="item-rating zmdi zmdi-star-outline p-r-2"></i>';
                                                    }
													
													?>
     
                                               
									</span>
                                    <?php echo ((int)$row->stock > 0) ? "<div style='color:white;
                                                                                     background-color:green;
                                                                                     border-radius:5px;
                                                                                     font-weight:100;
                                                                                     font-family: Poppins-Regular;
                                                                                    '>&nbspRaktáron&nbsp
                                                                        </div>" 
                                                                        : 
                                                                        "<div style='color:white;
                                                                                     background-color:red;
                                                                                     border-radius:5px;
                                                                                     font-weight:100;
                                                                                     font-family: Poppins-Regular;
                                                                                     '>&nbspNincs Raktáron&nbsp</div>";  ?>
<?php
// NOT WORKING YET!!!
//     |
//     |
//     V
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['whishlistID'])) {
    echo "NICE";
    if (!isset($_SESSION['loginSucces'])) {
        echo "<script>
            alert('A kívánságlistához adáshoz jelentkezzen be!');
            document.location.replace('/bejelentkezes');
            </script>";
    } else {
        $userID = $_SESSION['userID'];
        $whInsert = "INSERT INTO whishlist (userID,productID,name,sku,price) VALUES ('$userID', '$id', '$row->name', '$row->sku', '$price')";
        $sql = mysqli_query($link, $whInsert);
        echo $sql;
    }
    
}
?>
                                </div>
                                <form method="post" id="whishlistID">
                                    <div class="block2-txt-child2 flex-r p-t-3">
                                        <button id="whishlistID" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
                                            <img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png" alt="ICON">
                                            <img class="icon-heart2 dis-block trans-04 ab-t-l" src="images/icons/icon-heart-02.png" alt="ICON">
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
            
<?php

     }
     echo "</div>";
 }
 
}

?>
