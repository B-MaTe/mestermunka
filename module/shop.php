<?php

$resShopProduct = DBproduct($link);
?>
			
<div class="bg0 m-t-23 p-b-140">
	<div class="container">
		<div class="flex-w flex-sb-m p-b-52">
<!-- Filter -->
    <div class="panel-filter w-full p-t-10">
		<div class="wrap-filter flex-w bg6 w-full p-lr-40 p-t-27 p-lr-15-sm">
			<div class="filter-col1 p-r-15 p-b-27">
				<div class="mtext-102 cl2 p-b-15">
					Rendezés
				</div>
            <ul>
                
                <li class="p-b-6">
                    <label class="filterContainer">
                        Népszerűség
                        <input type="radio" name="sortby" value="popularity" id="popularity" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
                <li class="p-b-6">
                    <label class="filterContainer">
                    Értékelés
                        <input type="radio" name="sortby" value="rating" id="rating" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
                <li class="p-b-6">
                    <label class="filterContainer">
                    Legújabb
                        <input type="radio" name="sortby" value="newest" id="newest" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
                <li class="p-b-6">
                    <label class="filterContainer">
                        Ár: Legolcsóbbtól legdrágábbig
                        <input type="radio" name="sortby" value="cheap_exp" id="cheap_exp" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
                <li class="p-b-6">
                    <label class="filterContainer">
                    Ár: Legdrágábbtól legolcsóbbig
                        <input type="radio" name="sortby" value="exp_cheap" id="exp_cheap" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>

                <li class="p-b-6">
                    <label class="filterContainer">
                        Alapértelmezett
                        <input type="radio" name="sortby" checked="checked" value="all" id="default" class="common_selector checkboxFilter sortby"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
            </ul>
        </div>


    <div class="filter-col4 p-r-15 p-b-27">
        <div class="mtext-102 cl2 p-b-15">
                Kategóriák
            </div>
        <ul>
        <?php
        

        $categorySelect = "SELECT DISTINCT category FROM product WHERE product_status = '1' ORDER BY `id` ASC";
        $categoryRes = mysqli_query($link,$categorySelect);
        if (mysqli_num_rows($categoryRes)) {
            while ($row = mysqli_fetch_object($categoryRes)) {
                $category = $row->category;
        ?>
                <li class="p-b-6">
                    <label class="filterContainer">
                    <?php echo getRealName($category); ?>
                        <input type="radio" name="category" value="<?php echo $category; ?>" id="<?php echo $category; ?>" class="common_selector checkboxFilter category"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
                <?php
                
            }
        }
                ?>
                <li class="p-b-6">
                    <label class="filterContainer">
                        Alapértelmezett
                        <input type="radio" name="category" checked="checked" value="all" id="default" class="common_selector checkboxFilter category"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
            </ul>
        </div>

        

<?php
// Legmagasabb es legalacsonyabb ar
$highestSelect = "SELECT price FROM product ORDER BY price DESC LIMIT 1";
$highestRes = mysqli_query($link, $highestSelect);
if (mysqli_num_rows($highestRes)) {
    while ($highestRow = mysqli_fetch_object($highestRes)) {
        $highestPrice = $highestRow->price;
    }
}
$lowestSelect = "SELECT price FROM product ORDER BY price ASC LIMIT 1";
$lowestRes = mysqli_query($link, $lowestSelect);
if (mysqli_num_rows($lowestRes)) {
    while ($lowestRow = mysqli_fetch_object($lowestRes)) {
        $lowestPrice = $lowestRow->price;
    }
}


?>
        <div class="filter-col2 p-r-15 p-b-27">
        <div class="mtext-102 cl2 p-b-15">
                Ár
            </div>
    <div class="wrapperPrice">
        <fieldset class="filter-price">
            <div class="price-field">
                <input type="range" name="price" min="<?php echo $lowestPrice; ?>" max="<?php echo $highestPrice; ?>" value="<?php echo $lowestPrice; ?>" step="1000" id="lower">
                <input type="range" name="price" min="<?php echo $lowestPrice; ?>" max="<?php echo $highestPrice; ?>" value="<?php echo $highestPrice; ?>" step="1000" id="upper">
            </div>
            <div class="price-wrap">
                <div class="price-container">
                    <div class="price-wrap-1">
                        <input id="one" name="price" disabled>
                        <label for="one"> Ft</label>
                    </div>
                    <hr class="price-wrap_line">
                        <div class="price-wrap-2">
                            <input id="two" name="price" disabled>
                            <label for="two"> Ft</label>
                        </div>
                    </div>
                </div>
            </div>
        </fieldset>
    </div>

        <div class="filter-col3 p-r-15 p-b-27">
            <div class="mtext-102 cl2 p-b-15">
                Szín
            </div>

            <ul>

            <?php

            $colorSelect = "SELECT DISTINCT (color) FROM product WHERE product_status = '1' ORDER BY `id` ASC";
            $colorRes = mysqli_query($link,$colorSelect);
            if (mysqli_num_rows($colorRes)) {
                $colorList = [];
                while ($row = mysqli_fetch_object($colorRes)) {
                    $temp = explode(',',$row->color);
                    foreach( $temp as $tempColor) {
                        $colorList[] = $tempColor;
                    }
                }
                $finalColorList = array_unique($colorList);
                foreach ( $finalColorList as $color) {
                    ?>
                    <li class="p-b-6">
                    
                    <label class="filterContainer">
                    <?php echo getRealColor($color); ?>
                        <input type="radio" name="color" value="<?php echo $color; ?>" id="<?php echo $color; ?>" class="common_selector checkboxFilter color"> 
                        <span class="checkmark"></span>
                        <span class="fs-15 lh-12 m-r-6" style="color: <?php echo $color; ?>;">
                            <i class="zmdi zmdi-circle"></i>
                    </span>
                    </label>
                    
                </li>

                

                <?php
                }
            }
            
            ?>
                <li class="p-b-6">
                    <label class="filterContainer">
                        Alapértelmezett
                        <input type="radio" name="color" value="all" id="default" checked="checked" class="common_selector checkboxFilter color"> 
                        <span class="checkmark"></span>
                        
                    </label>
                </li>
            </ul>
        </div>
    </div>
    </div>
</div>
<div class="row filter_data">




